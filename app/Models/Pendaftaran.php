<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'tb_pendaftaran';

    protected $fillable = [
        'user_id', // Tambahkan ini agar bisa disimpan
        'nik',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'umur',
        'alamat',
        'no_hp',
        'agama',
        'pendidikan',
        'gol_darah',
        'pekerjaan',
        'nama_suami',
        'tgllahir_suami',
        'usia_suami',
        'hpht'
    ];

    // Opsional: Tambahkan relasi balik ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
