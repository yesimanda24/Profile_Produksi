<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan'); // Kepala, Koordinator SDH, Koordinator SDMKI, Anggota
            $table->string('tim')->nullable(); // SDH, SDMKI, atau null untuk pimpinan
            $table->string('foto')->nullable(); // nama file foto di public/images/
            $table->integer('urutan')->default(0); // untuk mengatur urutan tampil
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
