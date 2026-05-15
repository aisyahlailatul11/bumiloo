<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    // Tambahkan baris ini agar tidak error saat Simpan
    protected $fillable = [
        'nama_pasien', 
        'nik', 
        'no_hp', 
        'tgl_lahir', 
        'tgl_pemeriksaan', 
        'jam', 
        'keterangan'
    ];
}