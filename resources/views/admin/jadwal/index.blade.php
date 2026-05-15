<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Konsultasi - Bumiloo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style> 
        body { font-family: 'Poppins', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#F0F2F5] text-[#1E3A5F]">

    <div class="flex">
        <!-- Sidebar Placeholder -->
        <div class="w-64 bg-[#F875AA] min-h-screen hidden md:block shadow-xl">
             <div class="p-8 text-white font-bold text-2xl text-center border-b border-pink-400/50 italic">Bumiloo</div>
             <div class="p-6 text-white/90 text-sm">Sidebar Admin</div>
        </div>

        <!-- Konten Utama -->
        <div class="flex-1 p-10">
            <h1 class="text-3xl font-bold mb-8">Jadwal Konsultasi</h1>

            <!-- 1. DATA PASIEN (Muncul jika ada pasien dipilih dari Master Data) -->
            @if($pasien)
            <div class="mb-8 p-6 bg-white rounded-2xl border-l-[12px] border-[#F875AA] shadow-sm">
                <p class="text-base font-medium">
                    Pasien: <span class="font-bold">{{ $pasien->name }}</span> — 
                    NIK: <span class="font-bold">{{ $pasien->nik }}</span> — 
                    No. HP: <span class="font-bold">{{ $pasien->no_hp }}</span> — 
                    Tgl Lahir: <span class="font-bold">{{ $pasien->tgl_lahir }}</span>
                </p>
            </div>
            @endif

            <!-- 2. FORM INPUT JADWAL (Box Abu-abu) -->
            <div class="bg-[#E5E7EB] rounded-3xl overflow-hidden shadow-sm border border-gray-200 mb-12">
                <div class="px-8 py-4 border-b border-gray-300 bg-gray-200/50">
                    <span class="text-gray-600 font-bold text-sm uppercase tracking-widest">
                        {{ isset($editJadwal) ? 'Edit Jadwal Konsultasi' : 'Tambah Jadwal Konsultasi' }}
                    </span>
                </div>
                
                <form action="{{ isset($editJadwal) ? route('jadwal.update', $editJadwal->id) : route('jadwal.store') }}" method="POST" class="p-8">
                    @csrf
                    @if(isset($editJadwal)) @method('PUT') @endif

                    <!-- Hidden inputs untuk data pasien -->
                    <input type="hidden" name="nama_pasien" value="{{ $editJadwal->nama_pasien ?? ($pasien->name ?? 'Umum') }}">
                    <input type="hidden" name="nik" value="{{ $editJadwal->nik ?? ($pasien->nik ?? '-') }}">
                    <input type="hidden" name="no_hp" value="{{ $editJadwal->no_hp ?? ($pasien->no_hp ?? '-') }}">
                    <input type="hidden" name="tgl_lahir" value="{{ $editJadwal->tgl_lahir ?? ($pasien->tgl_lahir ?? '-') }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <!-- Tanggal -->
                        <div>
                            <label class="text-[11px] font-bold text-gray-500 uppercase tracking-widest">Tanggal Pemeriksaan</label>
                            <input type="date" name="tgl_pemeriksaan" value="{{ $editJadwal->tgl_pemeriksaan ?? '' }}" required
                                class="w-full mt-2 p-3 bg-white border-none rounded-xl shadow-inner focus:ring-2 focus:ring-pink-300 outline-none font-medium">
                        </div>
                        
                        <!-- Jam -->
                        <div>
                            <label class="text-[11px] font-bold text-gray-500 uppercase tracking-widest">Jam</label>
                            <input type="time" name="jam" value="{{ $editJadwal->jam ?? '' }}" required
                                class="w-full mt-2 p-3 bg-white border-none rounded-xl shadow-inner focus:ring-2 focus:ring-pink-300 outline-none font-medium">
                        </div>

                        <!-- Keterangan -->
                        <div class="md:col-span-2">
                            <label class="text-[11px] font-bold text-gray-500 uppercase tracking-widest">Keterangan</label>
                            <textarea name="keterangan" rows="3" placeholder="Masukkan detail konsultasi..."
                                class="w-full mt-2 p-4 bg-white border-none rounded-xl shadow-inner focus:ring-2 focus:ring-pink-300 outline-none font-medium resize-none">{{ $editJadwal->keterangan ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end gap-3">
                        @if(isset($editJadwal))
                            <a href="{{ route('jadwal.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-8 py-3 rounded-2xl font-bold transition">Batal</a>
                        @endif
                        <button type="submit" 
                            class="bg-[#F875AA] hover:bg-[#f55a9a] text-white px-10 py-3 rounded-2xl font-bold transition-all shadow-lg shadow-pink-200 flex items-center gap-2 transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                            {{ isset($editJadwal) ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>

           <!-- 3. TABEL DAFTAR JADWAL (Header Pink) -->
            <h2 class="text-xl font-bold mb-5 flex items-center gap-2">
                Daftar Jadwal Konsultasi
            </h2>
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#F875AA] text-white">
                        <tr class="text-sm">
                            <th class="p-5 font-bold">Nama Pasien</th>
                            <th class="p-5 font-bold">NIK</th>
                            <th class="p-5 font-bold">No. HP</th>
                            <th class="p-5 font-bold">Tgl Lahir</th>
                            <th class="p-5 font-bold">Tgl Pemeriksaan</th>
                            <th class="p-5 font-bold">Jam</th>
                            <th class="p-5 font-bold">Keterangan</th>
                            <th class="p-5 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-xs">
                        @foreach($jadwals as $j)
                        <tr class="border-b border-gray-50 hover:bg-pink-50/40 transition-colors">
                            <td class="p-5 font-medium text-black">{{ $j->nama_pasien }}</td>
                            <td class="p-5">{{ $j->nik }}</td>
                            <td class="p-5">{{ $j->no_hp }}</td>
                            <td class="p-5">{{ $j->tgl_lahir }}</td>
                            <td class="p-5 font-bold text-black">{{ date('d/m/Y', strtotime($j->tgl_pemeriksaan)) }}</td>
                            <td class="p-5 font-bold text-black">{{ $j->jam }}</td>
                            <td class="p-5 italic text-gray-500">{{ $j->keterangan }}</td>
                            <td class="p-5">
                                <div class="flex justify-center gap-3">
                                    <!-- Aksi Edit (Kotak Abu-abu, Ikon Kuning) -->
                                    <a href="{{ route('jadwal.index', ['edit_id' => $j->id]) }}" 
                                       class="w-10 h-10 flex items-center justify-center bg-[#D9D9D9] rounded-xl hover:bg-gray-300 transition shadow-sm" 
                                       title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#FFD700]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <!-- Aksi Hapus (Kotak Abu-abu, Ikon Merah) -->
                                    <button type="button" onclick="confirmDelete('{{ $j->id }}', '{{ $j->nama_pasien }}')" 
                                            class="w-10 h-10 flex items-center justify-center bg-[#D9D9D9] rounded-xl hover:bg-gray-300 transition shadow-sm" 
                                            title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#FF0000]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>

                                    <!-- Hidden Form untuk Delete -->
                                    <form id="delete-form-{{ $j->id }}" action="{{ route('jadwal.destroy', $j->id) }}" method="POST" class="hidden">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
    // Konfirmasi Hapus (SweetAlert Merah sesuai Figma)
    function confirmDelete(id, nama) {
        Swal.fire({
            title: 'Hapus Data Pasien?',
            text: "Apakah Anda yakin ingin menghapus jadwal pasien " + nama + "? Tindakan ini tidak dapat dibatalkan",
            icon: 'warning',
            iconColor: '#d33',
            showCancelButton: true,
            confirmButtonColor: '#ff0000',
            cancelButtonColor: '#d1d5db',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            customClass: {
                popup: 'rounded-[32px]',
                title: 'font-bold text-[#1E3A5F]',
                confirmButton: 'rounded-xl px-10 py-2 font-bold',
                cancelButton: 'rounded-xl px-10 py-2 font-bold text-gray-600'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>

<!-- Alert Sukses (Banner Hijau Figma) -->
@if(session('success'))
<script>
    Swal.fire({
        text: "{{ session('success') }}",
        showConfirmButton: false, 
        timer: 3000, 
        toast: true,
        position: 'top', 
        width: '450px',
        background: '#C6E7CE',
        color: '#000000', 
        showCloseButton: true, 
        customClass: {
            popup: 'rounded-xl shadow-sm border border-green-200 font-poppins',
        }
    });
</script>
@endif

</body>
</html>