<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BidanController;
use App\Http\Controllers\BumilController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// 1. Rute Home/Landing Page
Route::get('/', function () {
    return view('welcome');
});

// 2. Middleware Auth (Semua rute di dalam sini wajib login)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // REDIRECTOR DASHBOARD
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        if ($role === 'Admin') return redirect()->route('admin.dashboard');
        if ($role === 'Bidan') return redirect()->route('bidan.dashboard');
        
        // Khusus Ibu Hamil: Cek pendaftaran
        $sudahDaftar = \Illuminate\Support\Facades\DB::table('tb_pendaftaran')
            ->where('user_id', auth()->id())
            ->exists();
            
        return $sudahDaftar 
            ? redirect()->route('bumil.dashboard') 
            : redirect()->route('pendaftaran.create');
    })->name('dashboard');

    // ==========================================
    // --- GRUP ROUTE ADMIN ---
    // ==========================================
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        // Master Data
        Route::prefix('master')->group(function () {
            Route::get('/pasien', [AdminController::class, 'dataPasien'])->name('master.pasien');
            Route::get('/bidan', [AdminController::class, 'dataBidan'])->name('master.bidan');
            Route::get('/hak-akses', [AdminController::class, 'hakAkses'])->name('master.hakakses');
        });

        // Fitur Jadwal (Lengkap: View, Simpan, Edit, Hapus)
        Route::get('/jadwal', [AdminController::class, 'jadwalIndex'])->name('jadwal.index');
        Route::post('/jadwal', [AdminController::class, 'jadwalStore'])->name('jadwal.store');
        Route::put('/jadwal/{id}', [AdminController::class, 'jadwalUpdate'])->name('jadwal.update');
        Route::delete('/jadwal/{id}', [AdminController::class, 'jadwalDestroy'])->name('jadwal.destroy');
    });
    // Di dalam grup route admin
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    // ... rute yang sudah ada
    
    // Tambahkan rute ini:
    Route::get('/edukasi', function () {
        return view('admin.edukasi'); // Pastikan file views/admin/edukasi.blade.php ada
    })->name('admin.edukasi');

    Route::get('/laporan', function () {
        return view('admin.laporan'); 
    })->name('admin.laporan');
});

    // ==========================================
    // --- GRUP ROUTE BIDAN ---
    // ==========================================
    Route::prefix('bidan')->group(function () {
        Route::get('/dashboard', [BidanController::class, 'index'])->name('bidan.dashboard');
        // Tambahkan rute bidan lainnya di sini nanti
    });

    // ==========================================
    // --- GRUP ROUTE IBU HAMIL (BUMIL) ---
    // ==========================================
    Route::prefix('bumil')->group(function () {
        Route::get('/dashboard', [BumilController::class, 'index'])->name('bumil.dashboard');
    });

    // Fitur Pendaftaran Bumil
    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

    // PROFILE ROUTES (Agar navbar Breeze/Jetstream tidak error)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Logout Route (Menggunakan Controller yang sudah kita perbaiki)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';