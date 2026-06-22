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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workspace_id')->constrained('workspaces')->cascadeOnDelete();
            // Parent ID untuk Nested Notes (Folder system)
            $table->foreignId('parent_id')->nullable()->constrained('notes')->cascadeOnDelete();
            $table->string('title')->default('Untitled');
            $table->longText('content')->nullable();
            $table->string('icon')->nullable(); // Untuk menyimpan emoji/icon
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
