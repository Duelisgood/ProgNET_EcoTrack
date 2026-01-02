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
                        <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                        <select name="payment_method" required class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                            <option value="">-- Pilih Pembayaran --</option>
                            <option value="transfer_bank">Transfer Bank (BCA/Mandiri)</option>
                            <option value="qris">QRIS (Gopay/OVO/Dana)</option>
                            <option value="kartu_kredit">Kartu Kredit</option>
                        </select>
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