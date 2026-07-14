# 🛡️ Flowral Core System (Super Admin) Roadmap

## Status: IN PROGRESS (Phase 6)

### 1. 🎛️ Command Center (Dashboard)
- [x] Create Admin Layout & Components (Sidebar, Header, Layout)
- [x] Build Dashboard UI (Stat Cards, System Health)
- [x] Implement Dynamic Global Metrics

### 2. 👥 Identity & Access
- [ ] User Directory (List, Search, Filter)
- [ ] Impersonation Feature (Login as User)
- [ ] Suspend/Banned User Action

### 3. 🏢 Workspace Ecosystem
- [ ] Global Workspace List & Owner Details
- [ ] Storage & Usage Monitoring per Workspace
- [ ] Disable/Freeze Workspace Action

### 4. 🛡️ Shield & Security
- [ ] Active Sessions Monitor (Real-time IP, Browser, Time)
- [ ] Login History with complex filters
- [ ] Threat Detections (Brute Force, SQLi, XSS)
- [ ] Suspicious Activity / Anomalous Login Tracker

### 5. ⚙️ Global Configurations
- [ ] Maintenance Mode Toggle
- [ ] Global Feature Flags
- [ ] General App Settings

### 6. 📡 Broadcasts
- [ ] Global Banner / Announcement Publisher
- [ ] System Changelog Publisher

---
## 🚀 Future Development (Post-Core System)
- [ ] **Global Dark Mode**: Mengembangkan fitur *Dark Mode* secara menyeluruh untuk Landing Page dan Member Area, memastikan transisi warna tetap mulus (*smooth*), elegan, dan berkelas premium.




Rancangan Awal
1. 🎛️ Command Center (Dashboard / Overview)
Ini adalah halaman pertama yang Anda lihat. Fokusnya adalah pada bird's-eye view dari performa aplikasi Anda.

- Key Metrics: Total pengguna aktif, total Workspace yang terdaftar, pertumbuhan pengguna mingguan/bulanan.
- System Health: Penggunaan storage (karena user akan banyak upload file/gambar), beban server, atau status koneksi ke third-party API (jika menggunakan layanan email atau AI eksternal).
- Recent Activity Feed: Aktivitas penting yang terjadi secara global (misal: pendaftaran Workspace baru, atau pengguna yang menghapus akun mereka).

2. 👥 Identity & Access (User Management)
Modul untuk memantau dan mengelola semua pengguna yang terdaftar di Flowral.

- User Directory: Daftar lengkap semua pengguna dengan filter dan pencarian real-time.
- Impersonation (Login as): Fitur krusial bagi developer! Memungkinkan Anda login sebagai user tertentu tanpa password mereka, sangat berguna untuk debugging jika ada laporan bug dari user.
- Action Controls: Suspend/Banned akun yang melanggar ToS, force reset password, atau melihat login history pengguna tersebut.

3. 🏢 Workspace Ecosystem (Tenant Management)
Karena Flowral adalah aplikasi berbasis Workspace (ruang kerja), Anda perlu mengelolanya secara terpisah dari pengguna.

Workspace List: Daftar semua Workspace, siapa Owner-nya, dan berapa jumlah anggotanya.
Storage & Usage Limits: Memantau Workspace mana yang memakan storage terlalu besar atau memiliki data (Project/Task/Note) terbanyak.
Workspace Intervention: Fitur untuk menonaktifkan Workspace secara sepihak jika terindikasi digunakan untuk hal yang tidak semestinya.

4. ⚙️ Global Configurations (System Settings & Feature Flags)
Panel kontrol untuk mengubah pengaturan aplikasi tanpa perlu menyentuh kode atau file .env.

Maintenance Mode: Tombol darurat untuk mengaktifkan mode perbaikan, yang akan memblokir akses pengguna dengan halaman maintenance yang elegan.
Feature Flags (Toggles): Kemampuan untuk mematikan/menyalakan fitur tertentu secara global. (Contoh: "Matikan fitur AI sementara karena API sedang down").
Global Variables: Mengubah batas upload file maksimal, limit pembuatan Project per Workspace (jika versi free), dll.

5. 📡 Broadcast & Announcements (Komunikasi Global)
Modul untuk berkomunikasi dengan pengguna Anda langsung dari Core System.

Global Banner / Notification: Menulis pesan yang akan muncul di Header atau Dashboard semua pengguna (misal: "Pemeliharaan sistem malam ini pukul 00:00").
Changelog Publisher: Halaman khusus di admin untuk menulis Release Notes atau fitur baru, yang nantinya bisa dibaca oleh pengguna di dalam aplikasi mereka.

6. 📊 System Intelligence (Audit Logs & Feedback)
Untuk memantau apa yang terjadi di balik layar.

Error / Exception Logs: Membaca error logs Laravel langsung dari UI Admin tanpa perlu membuka server via terminal.
User Feedback / Support Tickets: Jika Anda menyediakan formulir feedback atau pelaporan bug di member area, laporannya akan masuk ke modul ini untuk Anda tindak lanjuti.

Rancangan Final dan tambahan.
🧩 Susunan Modul Core System (Super Admin)
🎛️ Command Center (Dashboard): Overview metrik, grafik pertumbuhan, dan status server.
👥 Identity & Access: Manajemen User, Impersonation, Suspend/Banned.
🏢 Workspace Ecosystem: Manajemen Workspace dan limitasi storage.
🛡️ Shield & Security (BARU):
Active Sessions: Memantau siapa yang sedang login (real-time), IP, Browser, & Durasi.
Login History: Rekam jejak login dengan filter kompleks.
Threat Detections: Deteksi Brute Force, SQL Injection, XSS, dan Rate Limit Monitor.
Suspicious Activity: Mendeteksi anomali (misal: perpindahan lokasi login yang tidak wajar).
⚙️ Global Configurations: Maintenance mode, Feature flags, limitasi global.
📡 Broadcasts: Pengumuman sistem dan Changelog.