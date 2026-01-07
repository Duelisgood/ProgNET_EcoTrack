<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dukung Operasional EcoTrack') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-green-700 text-white rounded-2xl p-6 shadow-lg sticky top-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-3 bg-white/20 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold">Ke Mana Donasi Anda?</h3>
                        </div>
                        
                        <p class="opacity-90 leading-relaxed mb-6 text-sm">
                            Donasi Anda bukan sekadar angka, melainkan "bahan bakar" bagi tim kami untuk terus bekerja menjaga lingkungan tetap bersih.
                        </p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="mt-1 bg-green-500 rounded-full p-1">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-yellow-300 text-sm">Upah & Kesejahteraan Petugas</h4>
                                    <p class="text-xs text-gray-200 mt-1">Memberikan apresiasi layak bagi para petugas kebersihan garda depan.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="mt-1 bg-green-500 rounded-full p-1">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-yellow-300 text-sm">Peremajaan Peralatan</h4>
                                    <p class="text-xs text-gray-200 mt-1">Pembelian alat pelindung diri (APD), sapu, karung, dan armada angkut.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="mt-1 bg-green-500 rounded-full p-1">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-yellow-300 text-sm">Operasional Harian</h4>
                                    <p class="text-xs text-gray-200 mt-1">Biaya transportasi dan logistik penjemputan sampah.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>

                <div class="lg:col-span-2">
                    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

                        @if(session('success'))
                        <div class="mb-6 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3 flex items-center gap-3 animate-pulse">
                            <div class="bg-green-100 p-2 rounded-full">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div>
                                <span class="font-bold block">Donasi Berhasil Diterima!</span>
                                <span class="text-sm">Terima kasih telah berkontribusi bagi kesejahteraan petugas kami.</span>
                            </div>
                        </div>
                        @endif

                        <form method="POST" action="/donasi" class="space-y-6" x-data="{ nominal: '' }">
                            @csrf

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Donatur (Opsional)</label>
                                <input type="text" name="donor_name" placeholder="Hamba Allah"
                                    class="w-full rounded-lg border-gray-300 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-green-500 transition py-3">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nominal Dukungan</label>
                                
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-3">
                                    <button type="button" @click="nominal = 10000" class="py-2 px-4 rounded-lg border border-gray-200 hover:border-green-500 hover:bg-green-50 text-gray-600 font-medium transition text-sm">Rp 10k</button>
                                    <button type="button" @click="nominal = 25000" class="py-2 px-4 rounded-lg border border-gray-200 hover:border-green-500 hover:bg-green-50 text-gray-600 font-medium transition text-sm">Rp 25k</button>
                                    <button type="button" @click="nominal = 50000" class="py-2 px-4 rounded-lg border border-gray-200 hover:border-green-500 hover:bg-green-50 text-gray-600 font-medium transition text-sm">Rp 50k</button>
                                    <button type="button" @click="nominal = 100000" class="py-2 px-4 rounded-lg border border-gray-200 hover:border-green-500 hover:bg-green-50 text-gray-600 font-medium transition text-sm">Rp 100k</button>
                                </div>

                                <div class="relative">
                                    <span class="absolute left-4 top-3.5 text-gray-500 font-bold">Rp</span>
                                    <input type="number" name="amount" x-model="nominal" required min="1000"
                                        class="w-full pl-12 rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 py-3 font-bold text-lg text-gray-800 placeholder-gray-300" 
                                        placeholder="0">
                                </div>
                                <p class="text-xs text-gray-400 mt-1 ml-1">*Dana akan dialokasikan langsung untuk kebutuhan operasional.</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Metode Pembayaran</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <label class="cursor-pointer group relative">
                                        <input type="radio" name="payment_method" value="gopay" class="peer hidden" required>
                                        <div class="border border-gray-200 rounded-xl p-3 flex items-center gap-3 transition-all duration-200 peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:ring-1 peer-checked:ring-blue-500 bg-white hover:shadow-md">
                                            <img src="{{ asset('img/gopay.jpg') }}" class="h-6" alt="GoPay">
                                            <span class="font-semibold text-gray-700 text-sm">GoPay</span>
                                        </div>
                                    </label>
                                    <label class="cursor-pointer group relative">
                                        <input type="radio" name="payment_method" value="dana" class="peer hidden" required>
                                        <div class="border border-gray-200 rounded-xl p-3 flex items-center gap-3 transition-all duration-200 peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:ring-1 peer-checked:ring-blue-500 bg-white hover:shadow-md">
                                            <img src="{{ asset('img/dana.jpg') }}" class="h-6" alt="DANA">
                                            <span class="font-semibold text-gray-700 text-sm">DANA</span>
                                        </div>
                                    </label>
                                    <label class="cursor-pointer group relative">
                                        <input type="radio" name="payment_method" value="ovo" class="peer hidden" required>
                                        <div class="border border-gray-200 rounded-xl p-3 flex items-center gap-3 transition-all duration-200 peer-checked:border-purple-500 peer-checked:bg-purple-50 peer-checked:ring-1 peer-checked:ring-purple-500 bg-white hover:shadow-md">
                                            <img src="{{ asset('img/logo ovo.jpg') }}" class="h-6" alt="OVO">
                                            <span class="font-semibold text-gray-700 text-sm">OVO</span>
                                        </div>
                                    </label>
                                    <label class="cursor-pointer group relative">
                                        <input type="radio" name="payment_method" value="qris" class="peer hidden" required>
                                        <div class="border border-gray-200 rounded-xl p-3 flex items-center gap-3 transition-all duration-200 peer-checked:border-green-500 peer-checked:bg-green-50 peer-checked:ring-1 peer-checked:ring-green-500 bg-white hover:shadow-md">
                                            <img src="{{ asset('img/qris.jpg') }}" class="h-6" alt="QRIS">
                                            <span class="font-semibold text-gray-700 text-sm">QRIS</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-green-500/30 transition transform hover:-translate-y-0.5 active:translate-y-0">
                                💚 Kirim Dukungan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>