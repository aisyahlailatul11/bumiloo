<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => ['required', 'string'],
        'secret_key' => ['nullable', 'string'],
    ]);

    // 1. LOGIKA KEAMANAN RAHASIA (KODE SUSAH DITEBAK)
    // Kita cek jika role yang dipilih adalah Admin atau Bidan
    if (in_array($request->role, ['Admin', 'Bidan'])) {
        $secretKey = "BML-SRV-9922-PJM-2026"; // Kode rahasia baru yang lebih rumit
        
        if ($request->secret_key !== $secretKey) {
            throw ValidationException::withMessages([
                'secret_key' => ['Akses Ditolak! Kode Otorisasi Petugas Tidak Valid.'],
            ]);
        }
    }

    // 2. PROSES PEMBUATAN USER
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    event(new Registered($user));

    // Langsung login otomatis setelah berhasil daftar
    Auth::login($user);

    // 3. LOGIKA PENGALIHAN (REDIRECT) SESUAI ROLE
    if ($user->role === 'Admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'Bidan') {
        return redirect()->route('bidan.dashboard');
    } elseif ($user->role === 'Bumil') {
        // Khusus Bumil: Langsung arahkan ke halaman pengisian formulir pendaftaran
        return redirect()->route('pendaftaran.create');
    }

return redirect(route('dashboard', absolute: false));
}
}
