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
    Schema::create('jadwals', function (Blueprint $table) {
        $table->id();
        // Data Pasien (Bisa relasi ke tabel users, tapi ini kita buat manual dulu sesuai figma)
        $table->string('nama_pasien');
        $table->string('nik');
        $table->string('no_hp');
        $table->string('tgl_lahir');
        
        // Data Jadwal Konsultasi
        $table->date('tgl_pemeriksaan');
        $table->time('jam');
        $table->text('keterangan')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
