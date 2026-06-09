<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('survei', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tim'); // Sumber Daya Hayati / Sumber Daya Mineral Konstruksi dan Industri
            $table->integer('target')->default(0);
            $table->integer('realisasi')->default(0);
            $table->integer('progres')->default(0); // 0-100
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('buku_pedoman')->nullable(); // nama file PDF
            $table->string('kuesioner')->nullable();    // nama file PDF
            $table->string('daftar_sampel')->nullable(); // nama file PDF
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survei');
    }
};
