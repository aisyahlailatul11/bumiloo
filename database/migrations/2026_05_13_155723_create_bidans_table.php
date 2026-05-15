<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('bidans', function (Blueprint $table) {
        $table->id();
        $table->string('id_bidan')->default('B001'); // ID Bidan sesuai gambar
        $table->string('nama');
        $table->string('status')->default('Aktif');
        $table->string('nip');
        $table->string('sip');
        $table->text('profil_singkat');
        $table->string('no_hp');
        $table->string('email');
        $table->string('alamat_praktik');
        $table->string('status_akreditasi');
        $table->string('jadwal_praktik');
        $table->string('detail_tambahan');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidans');
    }
};
