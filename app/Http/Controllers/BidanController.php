<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidan;

class BidanController extends Controller
{
    // 1. Dashboard Utama Bidan
    public function index()
    {
        // Mengarahkan ke file dashboardBidan.blade.php di folder resources/views/bidan/
        return view('bidan.dashboardBidan');
    }

    // 2. Halaman Profil (Siti Fatimah)
    public function profil()
    {
        // Kita ambil data pertama (karena praktik mandiri biasanya hanya ada 1 bidan)
        $bidan = Bidan::first(); 
        
        // Pastikan view mengarah ke tempat yang benar
        // Jika file kamu ada di resources/views/bidan/profil.blade.php:
        return view('bidan.profil', compact('bidan'));
    }

    // 3. Update Data Bidan
    public function update(Request $request, $id)
    {
        $bidan = Bidan::findOrFail($id);
        
        // Validasi simpel agar data aman
        $request->validate([
            'nama_bidan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->except(['_token', '_method']);
        
        // Logika upload foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images'), $nama_file);
            $data['foto'] = $nama_file;
        }

        $bidan->update($data);

        return redirect()->route('bidan.profil')->with('success', 'Profil Bidan berhasil diperbarui!');
    }
}