<x-guest-layout>
    <div class="flex flex-col md:flex-row w-full max-w-4xl bg-white rounded-[18px] shadow-2xl overflow-hidden min-h-[550px]">
        
        <!-- SISI KIRI: BACKGROUND & NAVIGASI -->
        <div class="w-full md:w-5/12 relative flex items-center justify-end overflow-hidden" 
             style="background-color: #FF93BF; background-image: url('{{ asset('images/background.jpeg') }}'); background-size: cover; background-position: center;">
            
            <div class="relative z-10 flex flex-col items-center justify-center space-y-12 w-[160px] h-full">
                <a href="{{ route('register') }}" class="text-white font-bold text-lg opacity-80 hover:opacity-100 transition-all">Register</a>
                <div class="bg-white text-gray-900 w-full py-4 rounded-l-full shadow-lg flex items-center justify-center font-bold text-xl translate-x-4">
                    Login
                </div>
            </div>
        </div>

        <!-- SISI KANAN: FORM LOGIN -->
        <div class="w-full md:w-7/12 p-12 md:p-16 flex flex-col justify-center bg-white">
            <h2 class="text-4xl font-bold text-gray-800 mb-10 tracking-tight">LOGIN</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <!-- Email -->
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1 ml-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">📧</span>
                        <input type="email" name="email" required class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-[18px] focus:border-pink-400 focus:ring-0 outline-none" placeholder="Masukkan email Anda">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1 ml-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">🔒</span>
                        <input type="password" name="password" required class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-[18px] focus:border-pink-400 focus:ring-0 outline-none" placeholder="Masukkan password Anda">
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center ml-1">
                    <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-pink-500 focus:ring-pink-500">
                    <label for="remember" class="ml-2 text-sm text-gray-500 font-medium">Remember me</label>
                </div>

                <button type="submit" class="w-full bg-black text-white font-bold py-4 rounded-[18px] shadow-lg uppercase tracking-widest hover:bg-gray-800 transition-all">
                    LOG IN
                </button>

                <p class="text-center text-sm text-gray-400 mt-6 font-medium">
                    Don't have an account? <a href="{{ route('register') }}" class="text-pink-500 font-bold hover:underline">Register here</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>