<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-800 leading-tight">
            {{ __('Dashboard Donasi Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Total Terkumpul</p>
                        <h3 class="text-2xl font-extrabold text-green-600 mt-1">
                            Rp {{ number_format($donations->sum('amount'), 0, ',', '.') }}
                        </h3>
                    </div>
                    <div class="p-3 bg-green-50 rounded-full text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Total Transaksi</p>
                        <h3 class="text-2xl font-extrabold text-gray-800 mt-1">
                            {{ $donations->count() }} <span class="text-sm font-normal text-gray-400">Donatur</span>
                        </h3>
                    </div>
                    <div class="p-3 bg-blue-50 rounded-full text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Rata-rata Donasi</p>
                        <h3 class="text-2xl font-extrabold text-gray-800 mt-1">
                            Rp {{ number_format($donations->avg('amount') ?? 0, 0, ',', '.') }}
                        </h3>
                    </div>
                    <div class="p-3 bg-purple-50 rounded-full text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-xl rounded-xl overflow-hidden border border-gray-100">
                <div class="p-6 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-800">Riwayat Transaksi Terbaru</h3>
                    <div class="flex items-center gap-2">
                         <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                         <span class="text-xs font-semibold text-gray-500">Live Data</span>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider font-semibold text-xs">
                            <tr>
                                <th class="px-6 py-4 text-left">Tanggal</th>
                                <th class="px-6 py-4 text-left">Nama Donatur</th>
                                <th class="px-6 py-4 text-left">Metode</th>
                                <th class="px-6 py-4 text-right">Nominal</th>
                                <th class="px-6 py-4 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($donations as $donation)
                            <tr class="hover:bg-gray-50/80 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    {{ $donation->created_at->format('d M Y, H:i') }}
                                </td>
                                
                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $donation->donor_name }}
                                    @if($donation->donor_name == 'Hamba Allah')
                                        <span class="ml-2 text-xs text-gray-400 italic">(Anonim)</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-700 uppercase border border-gray-200 tracking-wide">
                                        {{ $donation->payment_method ?? 'MANUAL' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-right font-bold text-green-600 text-base">
                                    + Rp {{ number_format($donation->amount, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-800 border border-green-200">
                                        ✓ BERHASIL
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="text-base font-medium text-gray-500">Belum ada donasi masuk.</p>
                                        <p class="text-sm text-gray-400">Data akan muncul otomatis saat user melakukan donasi.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>