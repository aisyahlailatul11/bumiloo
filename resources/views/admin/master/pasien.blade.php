<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien - Bumiloo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-[#F0F2F5] text-[#1E3A5F]">

    <div class="flex">
        <!-- SIDEBAR PINK (Kiri) -->
        <div class="w-64 bg-[#F875AA] min-h-screen shadow-xl flex flex-col">
            <div class="p-8 text-white flex flex-col items-center border-b border-pink-400/50">
                <div class="w-16 h-16 bg-white rounded-full mb-3 flex items-center justify-center shadow-inner">
                    <span class="text-pink-500 text-xs italic">Bumiloo</span>
                </div>
                <span class="font-bold text-lg tracking-tight">Super Admin</span>
            </div>
            
            <nav class="flex-1 p-4 mt-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 text-white hover:bg-pink-400 rounded-xl transition">
                    <span class="mr-3">🏠</span> Beranda
                </a>
                <div class="bg-white/20 rounded-xl">
                    <button class="w-full flex items-center p-3 text-white font-bold">
                        <span class="mr-3">📦</span> Master Data <span class="ml-auto">▼</span>
                    </button>
                    <div class="pl-10 pb-2 space-y-1">
                        <a href="{{ route('master.pasien') }}" class="block p-2 text-white text-sm font-bold border-l-2 border-white">Data Pasien</a>
                        <a href="{{ route('master.bidan') }}" class="block p-2 text-white text-sm opacity-80">Data Bidan</a>
                    </div>
                </div>
                <a href="{{ route('jadwal.index') }}" class="flex items-center p-3 text-white hover:bg-pink-400 rounded-xl transition">
                    <span class="mr-3">📅</span> Jadwal
                </a>
                <a href="#" class="flex items-center p-3 text-white hover:bg-pink-400 rounded-xl transition">
                    <span class="mr-3">📖</span> Input Edukasi
                </a>
                <a href="#" class="flex items-center p-3 text-white hover:bg-pink-400 rounded-xl transition">
                    <span class="mr-3">📑</span> Laporan
                </a>
            </nav>
        </div>

        <!-- AREA KONTEN (Kanan) -->
        <div class="flex-1">
            <!-- NAVBAR ATAS -->
            <header class="bg-white p-4 flex items-center justify-between shadow-sm px-10">
                <span class="font-bold text-xl text-pink-500">Bumiloo</span>
                <div class="flex items-center gap-6">
                    <button class="relative text-gray-400">🔔</button>
                    <!-- SEARCH BAR FIGMA -->
                    <div class="relative">
                        <input type="text" placeholder="Cari..." class="pl-4 pr-10 py-2 bg-gray-100 rounded-full text-sm outline-none w-64 border border-gray-200">
                        <span class="absolute right-3 top-2.5 text-gray-400">🔍</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-pink-100 rounded-full flex items-center justify-center text-pink-500 text-xs font-bold italic">B</div>
                        <span class="text-gray-400">⚙️</span>
                    </div>
                </div>
            </header>

            <!-- ISI HALAMAN -->
            <main class="p-10">
                <h2 class="text-3xl font-bold text-black mb-1">Data Pasien</h2>
                <p class="text-sm font-bold text-gray-500 mb-6">Total Pasien : {{ $totalPasien }}</p>
                
                <h3 class="text-lg font-bold mb-4 border-b-2 border-pink-500 w-fit pb-1">Tabel Data Pasien</h3>

                <!-- TABEL DATA PASIEN -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[1800px]">
                        <thead class="bg-[#F875AA] text-white">
                            <tr class="text-sm">
                                <th class="p-5 font-bold">ID</th>
                                <th class="p-5 font-bold">NIK</th>
                                <th class="p-5 font-bold">Nama</th>
                                <th class="p-5 font-bold">Tempat Lahir</th>
                                <th class="p-5 font-bold">Tgl Lahir</th>
                                <th class="p-5 font-bold">Umur</th>
                                <th class="p-5 font-bold">Alamat</th>
                                <th class="p-5 font-bold">No HP</th>
                                <th class="p-5 font-bold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-xs">
                            @foreach($pasiens as $index => $p)
                            <tr class="border-b border-gray-50 hover:bg-pink-50/40 transition-colors">
                                <td class="p-5">{{ $index + 1 }}</td>
                                <td class="p-5">{{ $p->nik }}</td>
                                <td class="p-5 font-bold text-black uppercase">{{ $p->nama }}</td>
                                <td class="p-5">{{ $p->tempat_lahir }}</td>
                                <td class="p-5">{{ $p->tgl_lahir }}</td>
                                <td class="p-5 font-bold">{{ $p->umur }}</td>
                                <td class="p-5 italic">{{ $p->alamat }}</td>
                                <td class="p-5">{{ $p->no_hp }}</td>
                                <td class="p-5">
                                    <div class="flex justify-center gap-3">
                                        <!-- Tombol Tambah Jadwal (Ikon Plus Hijau) -->
                                        <a href="{{ route('jadwal.index', ['pasien_id' => $p->id]) }}" 
                                           class="w-10 h-10 flex items-center justify-center bg-[#D9D9D9] rounded-xl hover:bg-gray-300 transition shadow-sm" title="Tambah Jadwal">
                                            <span class="text-green-600 font-bold text-xl">➕</span>
                                        </a>
                                        <!-- Edit -->
                                        <button class="w-10 h-10 flex items-center justify-center bg-[#D9D9D9] rounded-xl hover:bg-gray-300 transition shadow-sm">
                                            <span class="text-[#FFD700] text-xl">📝</span>
                                        </button>
                                        <!-- Hapus -->
                                        <button class="w-10 h-10 flex items-center justify-center bg-[#D9D9D9] rounded-xl hover:bg-gray-300 transition shadow-sm">
                                            <span class="text-[#FF0000] text-xl">🗑️</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

</body>
</html>