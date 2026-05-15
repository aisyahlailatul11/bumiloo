<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BidanKonsultasiController extends Controller
{
    // Menampilkan daftar chat/konsultasi
    public function index()
{
    // Kita buat variabel kosong dulu supaya view-nya tidak error
    $konsultasis = []; 

    // Kirim variabel tersebut ke halaman view
    return view('bidan.Konsultasi', compact('konsultasis'));
}

    // Menampilkan detail chat (Room Chat)
    public function show($id)
    {
        // Pastikan file bidan/roomchat.blade.php sudah ada
        return view('bidan.roomchat');
    }

    // Fungsi untuk kirim pesan
    public function kirimPesan(Request $request, $id)
    {
        // Logika simpan pesan nanti di sini
        return back()->with('success', 'Pesan terkirim!');
    }
}