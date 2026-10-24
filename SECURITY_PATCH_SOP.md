# Panduan & SOP Security Patching (Oktober 2026)
**Target Sistem:** Local Development (Laragon) & Production Server (Hostinger Shared Hosting — 3 Website Laravel)  
**Tanggal Referensi Advisori:** 21 Oktober 2026

---

## 1. Ringkasan Insiden & Celah Keamanan yang Ditangani

| Komponen | CVE / Insiden | Tingkat Bahaya | Dampak Utama | Versi Aman (Minimum) |
| :--- | :--- | :--- | :--- | :--- |
| **PHP Core Runtime** | `CVE-2026-109618` & `CVE-2026-109619` (*PHP2Shell*) | **Critical (9.2)** | Unauthenticated RCE via *Out-of-Memory (OOM) Heap UAF* & *Stale Global State* pada worker PHP | **PHP 8.4.27** / **PHP 8.3.36** / **PHP 8.2.35** |
| **Node.js Runtime** | `CVE-2026-111497` (+9 CVE lain) | **High / Critical** | RCE / DoS pada Brotli decoder, TLS hostname validation, & DNS truncation | **Node.js v24.22.1** / **v22.23.4** |
| **Composer Vendor** | 41 Advisory (`laravel/framework`, `symfony/*`, `guzzlehttp/*`, `maatwebsite/excel`, `league/commonmark`) | **High & Medium** | Arbitrary File Write (`CVE-2026-84374`), Email/SMTP Header Injection, SSRF Bypass, ReDoS, XSS | `laravel/framework >= 13.30.0`, `maatwebsite/excel >= 3.1.70` |
| **NPM Packages** | 14 Advisory (`vite`, `postcss`, `shell-quote`, `nanoid`, `browserslist`) | **Critical & High** | Command Injection, Path Traversal `.map`, Memory Exhaustion OOM | Patch via `npm audit fix` |

---

## 2. Persiapan Environment Local (Laragon) — *Cukup Dilakukan 1x*

Langkah ini memastikan mesin local Anda berjalan di atas runtime PHP & Node.js yang sudah di-patch.

### A. Versi Runtime di Laragon
Pastikan di Laragon sudah memilih:
- **PHP:** `php-8.4.27-Win32-vs17-x64` (PHP **8.4.27**)
- **Node.js:** `node-v24.22.1-win-x64` (Node.js **v24.22.1**)
- Klik kanan Laragon $\rightarrow$ **Tools $\rightarrow$ Path $\rightarrow$ Add Laragon to Path** agar terminal VS Code / PowerShell memanggil PHP 8.4.27 dan Node v24.22.1 milik Laragon (bukan Node.js lama di `C:\Program Files\nodejs`).

### B. Konfigurasi `php.ini` (`C:\laragon\bin\php\php-8.4.27-Win32-vs17-x64\php.ini`)
Pastikan ekstensi wajib Laravel & Excel aktif (tanpa tanda titik koma `;` di depan) dan fitur `upload_progress` dimatikan:

```ini
extension=pdo_mysql
extension=pdo_sqlite
extension=sqlite3
extension=zip
zend_extension=opcache

; Mitigasi vektor eksploitasi CVE-2026-109618 (PHP2Shell)
session.upload_progress.enabled = Off
```

> **Catatan:** Untuk `Project_NotClone`, file `php.ini` di Laragon Anda **sudah diperbarui otomatis**. Jangan lupa klik **Reload / Stop-Start** di Laragon.

---

## 3. SOP Patching di LOCAL (Ulangi untuk Ketiga Website Laravel)

Lakukan langkah-langkah berikut pada **masing-masing project Laravel** Anda di komputer local sebelum di-*push* ke Git.

### Langkah 3.1 — Hardening File `public/.user.ini` dan `public/.htaccess`
1. Buat file `public/.user.ini` dengan isi berikut (berlaku untuk PHP-FPM / FastCGI / CloudLinux):
   ```ini
   ; Security Hardening (Mitigasi Vektor CVE-2026-109618 / PHP2Shell)
   session.upload_progress.enabled = 0
   expose_php = Off
   ```
2. Tambahkan baris berikut di bagian paling bawah `public/.htaccess` (berlaku untuk LiteSpeed `lsapi` / Apache `mod_php`):
   ```apache
   <IfModule lsapi_module>
       php_flag session.upload_progress.enabled Off
   </IfModule>
   <IfModule mod_php.c>
       php_flag session.upload_progress.enabled Off
   </IfModule>
   ```

### Langkah 3.2 — Bersihkan Hook `pre-package-uninstall` di `composer.json`
Buka `composer.json` di masing-masing project, lalu **hapus** blok `"pre-package-uninstall"` di dalam `"scripts"` jika ada:
```diff
         "post-create-project-cmd": [
             "@php artisan key:generate --ansi",
             "@php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\"",
             "@php artisan migrate --graceful --ansi"
-        ],
-        "pre-package-uninstall": [
-            "Illuminate\\Foundation\\ComposerScripts::prePackageUninstall"
         ]
```
*(Alasan: Saat upgrade ke Symfony 8.1+, paket `symfony/polyfill-php83` dihapus. Jika hook `pre-package-uninstall` masih ada, Composer akan crash di tengah jalan karena memanggil autoloader lama yang mencari file `polyfill-php83/bootstrap.php` yang baru saja dihapus).*

### Langkah 3.3 — Jalankan Perintah Update & Audit di Terminal Local
Jalankan perintah ini secara berurutan di terminal masing-masing project:

```bash
# 1. Pastikan terminal menggunakan PHP 8.4.27 & Node v24.22.1
php -v
node -v

# 2. Cek semua ekstensi PHP (pastikan ext-zip berstatus success)
composer check-platform-reqs

# 3. Update seluruh dependency ke versi aman & perbarui composer.lock
composer update --with-all-dependencies

# 4. Jika sebelumnya sempat terputus di tengah jalan, pastikan install & autoload bersih
composer install
composer dump-autoload

# 5. Verifikasi keamanan Composer (Pastikan hasilnya: "No security vulnerability advisories found")
composer audit

# 6. Patch celah keamanan package frontend (node_modules) & build ulang aset produksi
npm audit fix
npm run build

# 7. Bersihkan cache local Laravel & pastikan tidak ada error
php artisan optimize:clear
```

### Langkah 3.4 — Push ke Repository Git
```bash
git add .
git commit -m "chore(security): patch PHP 8.4 compatibility, CVE dependencies, and upload_progress hardening"
git push
```

---

## 4. SOP Patching di SERVER (Hostinger Shared Hosting — Untuk 3 Website Laravel)

Lakukan tahapan ini untuk **masing-masing dari 3 website Laravel** Anda di Hostinger.

### Tahap A — Lewat Dashboard hPanel Hostinger
1. Login ke **hPanel Hostinger** $\rightarrow$ pilih **Website** $\rightarrow$ masuk ke menu **Advanced** $\rightarrow$ **PHP Configuration**.
2. Pada tab **PHP Version**, pilih **PHP 8.4** lalu klik **Update / Save**.
   - *Mengganti versi PHP di hPanel juga otomatis me-restart worker PHP LiteSpeed sehingga membersihkan memori proses lama (`CVE-2026-109619`).*
   - *Jika di server Anda masih tertera `8.3.35 (built: Oct 21 2026)` atau belum sempat pindah ke 8.4, segera jadwalkan pindah ke 8.4 karena masa dukungan keamanannya aktif hingga 2028.*
3. Pada tab **PHP Extensions**, pastikan ekstensi berikut tercentang:
   - `zip` (wajib untuk export/import Excel)
   - `intl`
   - `mbstring`
   - `bcmath`
   - `gd`
4. Pada tab **PHP Options** (jika tersedia pengaturan `session.upload_progress.enabled`), pastikan bernilai **Off** (meskipun sudah kita proteksi ganda lewat `public/.user.ini` dan `public/.htaccess`).

### Tahap B — Lewat SSH Server Hostinger
Masuk ke SSH Hostinger dan pindah (`cd`) ke direktori masing-masing website Laravel Anda, lalu jalankan:

```bash
# 1. Tarik kode, composer.lock, dan hasil build terbaru dari Git
git pull

# 2. Cek versi PHP CLI yang aktif di SSH
php -v
```

> **PENTING — Catatan Khusus SSH CloudLinux Hostinger:**  
> Terkadang meskipun di hPanel sudah diubah ke PHP 8.4, perintah `php -v` di SSH masih memanggil PHP CLI default (`8.3`).  
> - Jika `php -v` sudah menampilkan **PHP 8.4.x**, gunakan perintah `composer` dan `php artisan` seperti biasa di bawah.  
> - Jika `php -v` masih menampilkan **PHP 8.3.x**, Anda tetap bisa menjalankan perintah biasa (karena `"php": "^8.3"` di `composer.json` mendukung 8.3 & 8.4), **ATAU** memanggil binary PHP 8.4 Hostinger secara eksplisit dengan `/opt/alt/php84/usr/bin/php`.

```bash
# 3. Install vendor di server sesuai composer.lock yang sudah di-patch di local
composer install --no-dev --optimize-autoloader

# (Alternatif jika ingin memaksa memakai binary PHP 8.4 di SSH Hostinger:)
# /opt/alt/php84/usr/bin/php $(which composer) install --no-dev --optimize-autoloader

# 4. Pastikan autoloader ter-generate sempurna
composer dump-autoload --optimize

# 5. Verifikasi di server bahwa seluruh package bebas CVE
composer audit

# 6. Jalankan migrasi (jika ada) & bangun ulang cache production
php artisan migrate --force
php artisan optimize:clear
php artisan optimize
```

---

## 5. Daftar Periksa (Checklist) Eksekusi 3 Website

Gunakan tabel ini untuk memantau progres patching ketiga website Laravel Anda:

| Nama Website / Project | Patch & Audit di Local (`composer audit` OK) | Push ke Git | Switch PHP 8.4 di hPanel | `git pull` & `composer install` di SSH | `php artisan optimize` di SSH |
| :--- | :---: | :---: | :---: | :---: | :---: |
| **1. Project_NotClone (Flowral)** | [ ] | [ ] | [ ] | [ ] | [ ] |
| **2. Website Laravel #2** | [ ] | [ ] | [ ] | [ ] | [ ] |
| **3. Website Laravel #3** | [ ] | [ ] | [ ] | [ ] | [ ] |

---

## 6. Troubleshooting Cepat

1. **Error `Failed opening required '.../symfony/polyfill-php83/bootstrap.php'` saat `composer update` atau `php artisan`:**
   - **Penyebab:** Hook `"pre-package-uninstall"` di `composer.json` memanggil `vendor/autoload.php` lama sebelum `autoload_files.php` selesai diperbarui oleh Composer.
   - **Solusi:**
     1. Hapus `"pre-package-uninstall"` dari `composer.json`.
     2. Hapus baris yang memuat `symfony/polyfill-php83/bootstrap.php` di dalam `vendor/composer/autoload_files.php` dan `vendor/composer/autoload_static.php` (atau hapus folder `vendor/` lalu jalankan `composer install`).
     3. Jalankan `composer dump-autoload`.

2. **Error `phpoffice/phpspreadsheet requires ext-zip (*) -> missing`:**
   - **Penyebab:** Ekstensi `zip` belum diaktifkan di `php.ini` untuk versi PHP yang baru diinstal.
   - **Solusi:** Buka `php.ini` versi PHP aktif di Laragon, ubah `;extension=zip` menjadi `extension=zip`, lalu restart Laragon.
