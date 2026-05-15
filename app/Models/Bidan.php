<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidan extends Model
{
    protected $fillable = [
    'nama', 'status', 'nip', 'sip', 'profil_singkat', 
    'no_hp', 'email', 'alamat_praktik', 'status_akreditasi', 
    'jadwal_praktik', 'detail_tambahan', 'foto'
];
}