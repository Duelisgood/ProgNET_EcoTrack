<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-800 leading-tight">
            {{ __('Dashboard Laporan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ url('/donasi') }}"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow">
                    💚 Donasi Sekarang
                </a>
            </div>

            <div class="flex justify-between items-center mb-6 px-4 sm:px-0">
                <h3 class="text-2xl font-bold text-gray-800">Riwayat Laporan</h3>
                <a href="{{ url('/#report') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition transform hover:scale-105 text-sm">
                    + Buat Laporan Baru
                </a>
            </div>

            @if($reports->isEmpty())
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-10 text-center">
                <div class="mb-4">
                    <svg class="w-20 h-20 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-medium text-gray-900">Belum ada laporan</h3>
                <p class="text-gray-500 mt-2">Mari bantu bersihkan lingkungan dengan mengirim laporan pertama Anda.</p>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($reports as $report)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">

                    <div class="relative h-48 bg-gray-200 overflow-hidden">
                        <img src="{{ asset('storage/' . $report->image_path) }}"
                            alt="Foto Laporan"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                        <div class="absolute top-3 right-3">
                            @if($report->status == 'pending')
                            <span class="px-3 py-1 text-xs font-bold text-white bg-yellow-500 rounded-full shadow-sm">Pending</span>
                            @elseif($report->status == 'process')
                            <span class="px-3 py-1 text-xs font-bold text-white bg-blue-500 rounded-full shadow-sm">Diproses</span>
                            @else
                            <span class="px-3 py-1 text-xs font-bold text-white bg-green-500 rounded-full shadow-sm">Selesai</span>
                            @endif
                        </div>
                    </div>

                    <div class="p-5">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $report->created_at->format('d M Y, H:i') }}
                        </div>

                        <h4 class="font-bold text-lg text-gray-800 mb-1 truncate">{{ $report->location }}</h4>
                        <p class="text-gray-600 text-sm line-clamp-2 h-10">{{ $report->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</x-app-layout>