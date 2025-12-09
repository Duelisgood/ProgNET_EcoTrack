<x-guest-layout>
    <div class="bg-gray-900 flex items-center justify-center min-h-screen">

        <div class="flex flex-col md:flex-row bg-gray-800 rounded-lg overflow-hidden shadow-lg w-[90%] max-w-[900px] h-auto my-10">
            
            <div class="w-full md:w-1/2 h-48 md:h-auto shadow-lg relative group">
    
                <a href="{{ url('/') }}" class="absolute top-4 left-4 z-10 bg-black/30 backdrop-blur-sm text-white px-3 py-1.5 rounded-full hover:bg-yellow-500 transition flex items-center gap-2 text-xs font-semibold border border-white/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Home
                </a>

                <img src="{{ asset('Img/City3.png') }}" 
                        alt="City view" 
                        class="object-cover w-full h-full">
            </div>

            <div class="w-full md:w-1/2 bg-[#1c5132] flex flex-col justify-center items-center p-6 md:p-10">
                <h2 class="text-white text-2xl font-bold mb-6">EcoTrack Register</h2>

                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-400 w-3/4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="flex flex-col w-3/4 space-y-4">
                    @csrf <div>
                        <input type="text" name="name" id="name" placeholder="Nama Lengkap" required autofocus
                               class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 text-black"
                               value="{{ old('name') }}">
                    </div>

                    <div>
                        <input type="email" name="email" id="email" placeholder="Email Address" required
                               class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 text-black"
                               value="{{ old('email') }}">
                    </div>

                    <div>
                        <input type="password" name="password" id="password" placeholder="Password" required
                               class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 text-black">
                    </div>

                    <div>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" required
                               class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 text-black">
                    </div>

                    <button type="submit" 
                            class="w-full bg-yellow-500 text-white font-semibold py-2 rounded-md shadow hover:bg-yellow-600 transition mt-4">
                        REGISTER
                    </button>
                </form>

                <p class="text-gray-300 text-sm mt-6">OR REGISTER WITH</p>
                <button class="mt-3 bg-white rounded-full p-2 shadow hover:scale-105 transition">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-6 h-6">
                </button>
                
                <p class="text-gray-300 text-xs mt-4">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-yellow-400 hover:underline">Login disini</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>