<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bidan - Bumiloo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#F0F4F8] text-black">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-[#F875AA] hidden md:flex flex-col shadow-xl">
            <div class="p-8 text-white font-bold text-2xl text-center border-b border-pink-400/50">
                Bumiloo
            </div>
            <div class="p-6 text-white/80 text-sm italic">
                Sidebar akan ada di sini
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="flex-1 p-10 lg:p-16">
            <div class="max-w-5xl mx-auto">
                <h1 class="text-3xl font-bold text-[#1E3A5F] mb-8 tracking-tight">Data Bidan</h1>

                <form action="{{ route('bidan.update', $bidan->id) }}" method="POST" enctype="multipart/form-data" 
                      x-data="{ isEditing: false, photoPreview: '{{ asset('images/profil-bidan.jpeg') }}' }">
                    @csrf
                    @method('PUT')

                    <div class="bg-white rounded-[32px] shadow-2xl shadow-blue-100/50 border border-white overflow-hidden">
                        
                        <!-- Header Card -->
                        <div class="px-10 py-6 border-b border-gray-50 flex justify-between items-center bg-white/50">
                            <span class="text-gray-400 font-bold text-xs uppercase tracking-[0.3em]">Profil Bidan</span>
                            
                            <div class="flex gap-4">
                                <!-- Tombol Edit -->
                                <button type="button" @click="isEditing = true"
                                    :class="isEditing ? 'bg-[#CBD5E0] cursor-default' : 'bg-[#F875AA] hover:bg-[#f55a9a] transform hover:scale-105 shadow-lg'"
                                    class="flex items-center gap-2 text-white px-6 py-2.5 rounded-2xl text-sm font-bold transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit Profil
                                </button>

                                <!-- Tombol Simpan -->
                                <button type="submit" :disabled="!isEditing"
                                    :class="isEditing ? 'bg-[#F875AA] hover:bg-[#f55a9a] transform hover:scale-105 shadow-lg shadow-pink-200' : 'bg-[#CBD5E0] cursor-not-allowed'"
                                    class="flex items-center gap-2 text-white px-6 py-2.5 rounded-2xl text-sm font-bold transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                    </svg>
                                    Simpan
                                </button>
                            </div>
                        </div>

                        <!-- Grid Konten -->
                        <div class="p-12 grid grid-cols-1 md:grid-cols-2 gap-16">
                            
                            <!-- KOLOM KIRI -->
                            <div class="space-y-8">
                                <div class="flex items-center gap-6 mb-4">
                                    <!-- Foto Bidan -->
                                    <div class="relative group">
                                        <div class="w-32 h-32 rounded-full border-[6px] border-white overflow-hidden shadow-2xl bg-gray-50 ring-1 ring-gray-100">
                                            <img :src="photoPreview" class="w-full h-full object-cover">
                                        </div>
                                        <label x-show="isEditing" x-cloak 
                                               class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-full cursor-pointer transition-opacity opacity-0 group-hover:opacity-100 backdrop-blur-[2px]">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            </svg>
                                            <input type="file" name="foto" class="hidden" 
                                                   @change="const file = $event.target.files[0]; if (file) { photoPreview = URL.createObjectURL(file) }">
                                        </label>
                                    </div>

                                    <div class="space-y-4">
                                        <div>
                                            <label class="text-xs font-normal text-gray-500 uppercase tracking-widest">ID Bidan</label>
                                            <p class="text-base font-medium text-black mt-1">{{ $bidan->id_bidan }}</p>
                                        </div>
                                        <div>
                                            <label class="text-xs font-normal text-gray-500 uppercase tracking-widest">Nama Bidan</label>
                                            <input type="text" name="nama" value="{{ $bidan->nama }}" :disabled="!isEditing"
                                                class="block w-full p-1 border-b border-transparent focus:ring-0 focus:border-pink-300 text-base font-medium text-black bg-transparent transition-all">
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-6">
                                    <div>
                                        <label class="text-xs font-normal text-gray-500 uppercase tracking-widest">Status Praktik</label>
                                        <input type="text" name="status" value="{{ $bidan->status }}" :disabled="!isEditing"
                                            class="block w-full p-1 border-b border-transparent focus:ring-0 focus:border-pink-100 font-medium text-black text-base bg-transparent">
                                    </div>
                                    <div>
                                        <label class="text-xs font-normal text-gray-500 uppercase tracking-widest">NIP</label>
                                        <input type="text" name="nip" value="{{ $bidan->nip }}" :disabled="!isEditing"
                                            class="block w-full p-1 border-b border-transparent focus:ring-0 focus:border-pink-100 font-medium text-black text-base bg-transparent">
                                    </div>
                                    <div>
                                        <label class="text-xs font-normal text-gray-500 uppercase tracking-widest">SIP (Surat Izin Praktik)</label>
                                        <input type="text" name="sip" value="{{ $bidan->sip }}" :disabled="!isEditing"
                                            class="block w-full p-1 border-b border-transparent focus:ring-0 focus:border-pink-100 font-medium text-black text-base bg-transparent">
                                    </div>
                                    <div>
                                        <label class="text-xs font-normal text-gray-500 uppercase tracking-widest">Profil Singkat & Layanan</label>
                                        <textarea name="profil_singkat" :disabled="!isEditing" rows="3"
                                            class="block w-full p-1 border-b border-transparent focus:ring-0 focus:border-pink-100 text-sm font-medium text-black leading-relaxed disabled:resize-none bg-transparent mt-1">{{ $bidan->profil_singkat }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- KOLOM KANAN -->
                            <div class="space-y-12">
                                <!-- Kontak -->
                                <div class="space-y-6">
                                    <h4 class="text-lg font-bold text-[#1E3A5F] flex items-center gap-3">
                                        <span class="w-1.5 h-6 bg-[#F875AA] rounded-full"></span> Kontak
                                    </h4>
                                    <div class="space-y-6">
                                        <div>
                                            <label class="text-xs font-normal text-gray-500 uppercase tracking-widest">No. HP</label>
                                            <input type="text" name="no_hp" value="{{ $bidan->no_hp }}" :disabled="!isEditing"
                                                class="block w-full p-1 border-b border-transparent focus:ring-0 font-medium text-black text-base bg-transparent">
                                        </div>
                                        <div>
                                            <label class="text-xs font-normal text-gray-500 uppercase tracking-widest">Email</label>
                                            <input type="email" name="email" value="{{ $bidan->email }}" :disabled="!isEditing"
                                                class="block w-full p-1 border-b border-transparent focus:ring-0 font-medium text-black text-base bg-transparent">
                                        </div>
                                    </div>
                                </div>

                                <!-- Detail Praktik -->
                                <div class="space-y-6 pt-4">
                                    <h4 class="text-lg font-bold text-[#1E3A5F] flex items-center gap-3">
                                        <span class="w-1.5 h-6 bg-[#F875AA] rounded-full"></span> Detail Praktik Mandiri
                                    </h4>
                                    <div class="grid grid-cols-1 gap-6">
                                        <div>
                                            <label class="text-xs font-normal text-gray-500 uppercase tracking-widest">Alamat Praktik Mandiri</label>
                                            <input type="text" name="alamat_praktik" value="{{ $bidan->alamat_praktik }}" :disabled="!isEditing"
                                                class="block w-full p-1 border-b border-transparent focus:ring-0 font-medium text-black text-base bg-transparent">
                                        </div>
                                        <div>
                                            <label class="text-xs font-normal text-gray-500 uppercase tracking-widest">Status Akreditasi TPMB</label>
                                            <input type="text" name="status_akreditasi" value="{{ $bidan->status_akreditasi }}" :disabled="!isEditing"
                                                class="block w-full p-1 border-b border-transparent focus:ring-0 font-bold text-[#F875AA] text-base uppercase bg-transparent">
                                        </div>
                                        <div>
                                            <label class="text-xs font-normal text-gray-500 uppercase tracking-widest">Jadwal Praktik</label>
                                            <input type="text" name="jadwal_praktik" value="{{ $bidan->jadwal_praktik }}" :disabled="!isEditing"
                                                class="block w-full p-1 border-b border-transparent focus:ring-0 font-medium text-black text-base bg-transparent">
                                        </div>
                                        <div>
                                            <label class="text-xs font-normal text-gray-400 uppercase tracking-widest">Detail Tambahan</label>
                                            <input type="text" name="detail_tambahan" value="{{ $bidan->detail_tambahan }}" :disabled="!isEditing"
                                                class="block w-full p-1 border-b border-transparent focus:ring-0 text-sm font-medium text-gray-400 bg-transparent">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- SweetAlert2 untuk Popup -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        text: "Data berhasil diupdate!",
        iconHtml: '', // Menghilangkan icon default agar bersih
        showConfirmButton: false, // Menghilangkan tombol Oke
        timer: 3000, // Hilang otomatis dalam 3 detik
        timerProgressBar: false,
        toast: true,
        position: 'top', // Muncul di atas tengah sesuai Figma
        width: '450px',
        background: '#C6E7CE', // Warna hijau muda sesuai image_1f6d31.png
        color: '#000000', // Font warna hitam
        showCloseButton: true, // Ada tanda X di pojok
        customClass: {
            popup: 'rounded-xl shadow-sm border border-green-200 font-poppins',
        }
    });
</script>
@endif
</body>
</html>