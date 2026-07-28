<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Cek apakah kolom google_id belum ada, baru tambahkan
            if (!Schema::hasColumn('users', 'google_id')) {
                $table->string('google_id')->nullable()->after('email');
            }
            
            // Kita tidak menambahkan 'avatar' di sini karena sudah pernah dibuat sebelumnya.
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'google_id')) {
                $table->dropColumn('google_id');
            }
        });
    }
};
