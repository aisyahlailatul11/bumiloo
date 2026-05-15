<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts & Tailwind (Penting!) -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Scripts Breeze -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { 
                font-family: 'Poppins', sans-serif; 
                background-color: #fce4ec; /* Background Pink Solid Aisyah */
                margin: 0;
            }
        </style>
    </head>
    <body class="antialiased">
        {{-- Di sini kita hilangkan semua pembungkus abu-abu bawaan Laravel --}}
        <div class="min-h-screen flex items-center justify-center p-4">
            {{-- Slot ini adalah tempat Login & Register desain kamu muncul --}}
            {{ $slot }}
        </div>
    </body>
</html>