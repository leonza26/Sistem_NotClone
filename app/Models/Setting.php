<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['key', 'value', 'type'];
    /**
     * ⚡ GETTER SUPER CEPAT (Membaca dari RAM/Cache, bukan dari Database)
     * Cara panggil: Setting::get('maintenance_mode', false);
     */
    public static function get($key, $default = null)
    {
        return Cache::rememberForever("setting_{$key}", function () use ($key, $default) {
            $setting = self::where('key', $key)->first();

            if (!$setting) return $default;
            // Konversi tipe data kembali ke aslinya
            return match ($setting->type) {
                'boolean' => filter_var($setting->value, FILTER_VALIDATE_BOOLEAN),
                'integer' => (int) $setting->value,
                default => $setting->value,
            };
        });
    }
    /**
     * ✍️ SETTER PINTAR (Simpan ke DB dan otomatis hapus Cache lama)
     * Cara panggil: Setting::set('maintenance_mode', true, 'boolean');
     */
    public static function set($key, $value, $type = 'string')
    {
        // Konversi boolean sesungguhnya (true/false) menjadi teks agar aman masuk database
        if ($type === 'boolean') {
            $value = filter_var($value, FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false';
        }
        $setting = self::updateOrCreate(
            ['key' => $key],
            ['value' => (string) $value, 'type' => $type]
        );
        // Hapus ingatan lama agar sistem mengambil data yang baru saat di-refresh
        Cache::forget("setting_{$key}");

        return $setting;
    }
}
