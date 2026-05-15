<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Selamat Datang di Bumiloo</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #fdf2f5;
                color: #1b1b18;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: screen;
            }
            .hero-section {
                text-align: center;
                background: white;
                padding: 3rem;
                border-radius: 2rem;
                box-shadow: 0 10px 25px rgba(233, 30, 140, 0.1);
                max-width: 600px;
                width: 90%;
            }
            .logo-welcome {
                max-height: 120px;
                display: block;      /* Menjadikan gambar sebagai blok agar bisa di-center */
                margin: 0 auto 1.5rem auto; /* Atas: 0, Kanan-Kiri: auto (center), Bawah: 1.5rem */
}
            .btn-bumiloo {
                display: inline-block;
                padding: 0.8rem 2rem;
                border-radius: 50px;
                font-weight: 600;
                text-decoration: none;
                transition: 0.3s;
                margin: 0.5rem;
            }
            .btn-primary-bml {
                background-color: #f875aa;
                color: white;
            }
            .btn-primary-bml:hover {
                background-color: #E91E8C;
                transform: translateY(-2px);
            }
            .btn-outline-bml {
                border: 2px solid #f875aa;
                color: #f875aa;
            }
            .btn-outline-bml:hover {
                background-color: #fce4ec;
            }
            h1 { color: #E91E8C; font-weight: 700; margin-bottom: 1rem; }
            p { color: #706f6c; margin-bottom: 2rem; }
        </style>
    </head>
    <body>
        <div class="hero-section">
            <img src="{{ asset('images/logobumiloo.png') }}" alt="Logo Bumiloo" class="logo-welcome">
            
            <h1>Selamat Datang di Bumiloo</h1>
            <p>Sistem Informasi Pemantauan Kesehatan Ibu Hamil dan Janin yang Terintegrasi dan Mudah Digunakan.</p>

            <div class="nav-links">
                @if (Route::has('login'))
                    @auth
                        {{-- Logika Navigasi Cerdas Berdasarkan Role --}}
                        @php
                            $targetRoute = 'bumil.dashboard';
                            if (Auth::user()->role === 'Admin') $targetRoute = 'admin.dashboard';
                            if (Auth::user()->role === 'Bidan') $targetRoute = 'bidan.dashboard';
                        @endphp
                        
                        <a href="{{ route($targetRoute) }}" class="btn-bumiloo btn-primary-bml">
                            Masuk ke Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-bumiloo btn-primary-bml">
                            Masuk (Login)
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-bumiloo btn-outline-bml">
                                Daftar Akun
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </body>
</html>