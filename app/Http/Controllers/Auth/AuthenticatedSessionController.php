<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect kaku berdasarkan role (menghindari cache 'intended' dari role lain)
        if ($user->role === 'Admin') {
            return redirect()->route('admin.dashboard'); 
        }

        if ($user->role === 'Bidan') {
            return redirect()->route('bidan.dashboard');
        }

        if ($user->role === 'Bumil') {
            $sudahDaftar = DB::table('tb_pendaftaran')
                ->where('user_id', $user->id)
                ->exists();

            return $sudahDaftar 
                ? redirect()->route('bumil.dashboard') 
                : redirect()->route('pendaftaran.create');
        }

        return redirect('/');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke login agar user benar-benar keluar dari area dashboard
        return redirect('/login');
    }
}