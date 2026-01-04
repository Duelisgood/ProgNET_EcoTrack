<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-800 leading-tight">
            {{ __('Dashboard Laporan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 px-4 sm:px-0">
                <a href="{{ url('/donasi') }}"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
                    💚 Donasi Sekarang
                </a>
                
                <a href="{{ url('/#report') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition transform hover:scale-105 text-sm flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Buat Laporan Baru
                </a>
            </div>

            <div class="flex items-center mb-6 px-4 sm:px-0">
                <h3 class="text-2xl font-bold text-gray-800">Riwayat Laporan</h3>
            </div>

            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-4 sm:mx-0" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-4 sm:mx-0" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if($reports->isEmpty())
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-10 text-center mx-4 sm:mx-0">
                <div class="mb-4">
                    <svg class="w-20 h-20 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-medium text-gray-900">Belum ada laporan</h3>
                <p class="text-gray-500 mt-2">Mari bantu bersihkan lingkungan dengan mengirim laporan pertama Anda.</p>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4 sm:px-0">
                @foreach($reports as $report)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-100 flex flex-col h-full">

                    <div class="relative h-48 bg-gray-200 overflow-hidden group">
                        <img src="{{ asset('storage/' . $report->image_path) }}"
                            alt="Foto Laporan"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                        <div class="absolute top-3 right-3">
                            @if($report->status == 'pending')
                            <span class="px-3 py-1 text-xs font-bold text-white bg-yellow-500 rounded-full shadow-sm backdrop-blur-md bg-opacity-90">Pending</span>
                            @elseif($report->status == 'process')
                            <span class="px-3 py-1 text-xs font-bold text-white bg-blue-500 rounded-full shadow-sm backdrop-blur-md bg-opacity-90">Diproses</span>
                            @else
                            <span class="px-3 py-1 text-xs font-bold text-white bg-green-500 rounded-full shadow-sm backdrop-blur-md bg-opacity-90">Selesai</span>
                            @endif
                        </div>
                    </div>

                    <div class="p-5 flex-grow flex flex-col justify-between">
                        <div>
                            <div class="flex items-center text-sm text-gray-500 mb-2">
                                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $report->created_at->format('d M Y, H:i') }}
                            </div>

                            <h4 class="font-bold text-lg text-gray-800 mb-1 truncate" title="{{ $report->location }}">
                                {{ $report->location }}
                            </h4>
                            <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                                {{ $report->description }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-gray-100 mt-auto flex justify-between items-center">
                            @if($report->status == 'pending')
                                <form action="{{ route('reports.destroy', $report) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan laporan ini? Data akan dihapus permanen.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-semibold flex items-center transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Batalkan
                                    </button>
                                </form>
                            @else
                                <span class="text-xs text-gray-400 italic flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Terkunci ({{ $report->status == 'process' ? 'Diproses' : 'Selesai' }})
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</x-app-layout>