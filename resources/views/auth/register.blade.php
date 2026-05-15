<x-guest-layout>
    <div class="flex flex-col md:flex-row w-full max-w-4xl bg-white rounded-[18px] shadow-2xl overflow-hidden min-h-[600px]">
        
        <!-- SISI KIRI: BACKGROUND & NAVIGASI -->
        <div class="w-full md:w-5/12 relative flex items-center justify-end overflow-hidden" 
             style="background-color: #FF93BF; background-image: url('{{ asset('images/background.jpeg') }}'); background-size: cover; background-position: center;">
            
            <div class="relative z-10 flex flex-col items-center justify-center space-y-12 w-[160px] h-full">
                <div class="bg-white text-gray-900 w-full py-4 rounded-l-full shadow-lg flex items-center justify-center font-bold text-xl translate-x-4">
                    Register
                </div>
                <a href="{{ route('login') }}" class="text-white font-bold text-lg opacity-80 hover:opacity-100 transition-all">Login</a>
            </div>
        </div>

        <!-- SISI KANAN: FORM REGISTER -->
        <div class="w-full md:w-7/12 p-10 md:p-14 flex flex-col justify-center bg-white overflow-y-auto max-h-[750px]">
            <h2 class="text-4xl font-bold text-gray-800 mb-8 tracking-tight">REGISTER</h2>

            <form method="POST" action="{{ route('register') }}" x-data="{ role: 'Ibu Hamil' }" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 mb-1 ml-1 uppercase">Name</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">👤</span>
                        <input type="text" name="name" required class="w-full pl-12 pr-4 py-2.5 border-2 border-gray-200 rounded-[18px] focus:border-pink-400 focus:ring-0 outline-none" placeholder="Masukkan nama Anda">
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 mb-1 ml-1 uppercase">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">📧</span>
                        <input type="email" name="email" required class="w-full pl-12 pr-4 py-2.5 border-2 border-gray-200 rounded-[18px] focus:border-pink-400 focus:ring-0 outline-none" placeholder="Masukkan email Anda">
                    </div>
                </div>

                <!-- Password -->
<div>
    <label class="block text-[10px] font-bold text-gray-400 mb-1 ml-1 uppercase">Password</label>
    <div class="relative">
        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">🔒</span>
        <input type="password" name="password" required class="w-full pl-12 pr-4 py-2.5 border-2 border-gray-200 rounded-[18px] focus:border-pink-400 focus:ring-0 outline-none" placeholder="Masukkan password Anda">
    </div>
</div>

<!-- Confirm Password -->
<div>
    <label class="block text-[10px] font-bold text-gray-400 mb-1 ml-1 uppercase">Confirm Password</label>
    <div class="relative">
        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">🔒</span>
        <input type="password" name="password_confirmation" required class="w-full pl-12 pr-4 py-2.5 border-2 border-gray-200 rounded-[18px] focus:border-pink-400 focus:ring-0 outline-none" placeholder="Ketik ulang password Anda">
    </div>
</div>

                <!-- Role Selection -->
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 mb-1 ml-1 uppercase">Role</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">👥</span>
                        <select id="role" name="role" x-model="role" class="w-full pl-12 pr-4 py-2.5 border-2 border-gray-200 rounded-[18px] focus:border-pink-400 focus:ring-0 outline-none bg-white text-sm font-medium text-gray-700">
                            <option value="Ibu Hamil">Ibu Hamil</option>
                            <option value="Bidan">Bidan</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                </div>

                <!-- Secret Key -->
                <div x-show="role === 'Bidan' || role === 'Admin'" x-transition class="mt-2 bg-pink-50 p-4 rounded-[18px] border border-pink-200">
                    <label class="text-[10px] font-bold text-pink-700 uppercase ml-1">Kode Otorisasi Petugas</label>
                    <input type="password" name="secret_key" class="w-full mt-1 px-4 py-2 border border-pink-300 rounded-xl outline-none" placeholder="Masukkan kode rahasia">
                    <x-input-error :messages="$errors->get('secret_key')" class="mt-1" />
                </div>

                <button type="submit" class="w-full bg-black text-white font-bold py-4 rounded-[18px] shadow-lg uppercase tracking-widest mt-4 hover:bg-gray-800 transition-all">
                    REGISTER
                </button>

                <p class="text-center text-gray-400 text-xs mt-4">
                    Already registered? <a href="{{ route('login') }}" class="text-pink-500 font-bold hover:underline">LOG IN</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>