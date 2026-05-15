<?php

namespace Database\Seeders;

use App\Models\Bidan;
use Illuminate\Database\Seeder;

class BidanSeeder extends Seeder
{
    public function run()
    {
        Bidan::create([
            'id_bidan' => 'B001',
            'nama' => 'Siti Fatimah',
            'status' => 'Aktif',
            'nip' => '19850101200122001',
            'sip' => 'SIP/2023/05/001',
            'profil_singkat' => 'Bidan berpengalaman 15 tahun, spesialisasi ibu dan anak. Menyediakan layanan prenatal, postnatal, dan KB.',
            'no_hp' => '087656433212',
            'email' => 'sitifatimah@gmail.com',
            'alamat_praktik' => 'Jl. Melati No.5, Jember',
            'status_akreditasi' => 'Terakreditasi - A',
            'jadwal_praktik' => 'Senin-Jumat: 08:00 - 16:00',
            'detail_tambahan' => 'Masa Berlaku STR: 07/02/2028'
        ]);
    }
}