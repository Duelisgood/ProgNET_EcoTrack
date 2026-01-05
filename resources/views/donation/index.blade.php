<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Donasi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl p-6">

                <div>
                    @if(session('success'))
                    <div class="mb-6 rounded-lg bg-green-100 border border-green-200 text-green-700 px-4 py-3 shadow-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="font-bold">Donasi Berhasil!</span>
                        </div>
                        <p class="mt-1 text-sm">Terima kasih atas donasinya. Kontribusi Anda sangat berarti.</p>
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="mb-6 rounded-lg bg-red-100 border border-red-200 text-red-700 px-4 py-3">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>

                <form method="POST" action="/donasi" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Donatur
                        </label>
                        <input
                            type="text"
                            name="donor_name"
                            required
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Jumlah Donasi (Rp)
                        </label>
                        <input
                            type="number"
                            name="amount"
                            required
                            min="1000"
                            step="1"
                            inputmode="numeric"
                            pattern="[0-9]*"
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500" />
                    </div>

                    <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Metode Pembayaran
    </label>

    <div class="grid grid-cols-2 gap-4">
        
        <!-- GoPay -->
        <label class="cursor-pointer">
            <input type="radio" name="payment_method" value="gopay" class="peer hidden" required>
            <div class="border rounded-xl p-4 flex items-center justify-between
                        peer-checked:border-blue-600 peer-checked:ring-2 peer-checked:ring-blue-200">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('img/gopay.jpg') }}" class="h-6" alt="GoPay">
                    <span class="font-semibold">GoPay</span>
                </div>
            </div>
        </label>

        <!-- DANA -->
        <label class="cursor-pointer">
            <input type="radio" name="payment_method" value="dana" class="peer hidden">
            <div class="border rounded-xl p-4 flex items-center justify-between
                        peer-checked:border-blue-600 peer-checked:ring-2 peer-checked:ring-blue-200">
                        <img src="{{ asset('img/dana.jpg') }}" class="h-6" alt="DANA">
                <span class="font-semibold">DANA</span>
            </div>
        </label>

        <!-- OVO -->
        <label class="cursor-pointer">
            <input type="radio" name="payment_method" value="ovo" class="peer hidden">
            <div class="border rounded-xl p-4 flex items-center justify-between
                        peer-checked:border-purple-600 peer-checked:ring-2 peer-checked:ring-purple-200">
                        <img src="{{ asset('img/logo ovo.jpg') }}" class="h-6" alt="OVO">
                <span class="font-semibold">OVO</span>
            </div>
        </label>

        <!-- QRIS -->
        <label class="cursor-pointer">
            <input type="radio" name="payment_method" value="qris" class="peer hidden">
            <div class="border rounded-xl p-4 flex items-center justify-between
                        peer-checked:border-green-600 peer-checked:ring-2 peer-checked:ring-green-200">
                        <img src="{{ asset('img/qris.jpg') }}" class="h-6" alt="QRIS">
                <span class="font-semibold">QRIS</span>
            </div>
        </label>

    </div>
</div>

                    <button
                        type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 rounded-lg transition">
                        Donasi Sekarang
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>