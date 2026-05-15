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
        Schema::create('tb_pendaftaran', function (Blueprint $table) {
            $table->id();
            // Tambahkan baris ini untuk menghubungkan pendaftaran ke akun user (Ibu Hamil)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->integer('umur');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('gol_darah');
            $table->string('pekerjaan');
            $table->string('nama_suami');
            $table->date('tgllahir_suami');
            $table->integer('usia_suami');
            $table->date('hpht');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pendaftaran');
    }
};
