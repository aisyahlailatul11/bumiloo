<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('pendaftaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:tb_pendaftaran',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'umur' => 'required|integer',
            'alamat' => 'required',
            'no_hp' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'gol_darah' => 'required',
            'pekerjaan' => 'required',
            'nama_suami' => 'required',
            'tgllahir_suami' => 'required|date',
            'usia_suami' => 'required|integer',
            'hpht' => 'required|date',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'nama.required' => 'Nama tidak boleh kosong.',
            // ... (pesan error lainnya sudah oke)
        ]);

        $validated['user_id'] = Auth::id();

        if ($request->pekerjaan === 'lainnya') {
            $validated['pekerjaan'] = $request->pekerjaan_lainnya;
        }

        Pendaftaran::create($validated);

        // KITA ARAHKAN KE DASHBOARD BIDAN SETELAH SIMPAN
        return redirect()->route('bidan.dashboard')->with('success', 'Pendaftaran berhasil disimpan!');
    }
}