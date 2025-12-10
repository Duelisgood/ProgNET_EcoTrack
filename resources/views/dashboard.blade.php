<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    
                    <h3 class="text-lg font-bold mb-4">Riwayat Laporan Saya</h3>

                    @if($reports->isEmpty())
                        <div class="text-center py-10 text-gray-500">
                            <p>Anda belum pernah mengirim laporan.</p>
                            <a href="{{ url('/') }}" class="text-green-600 hover:underline mt-2 inline-block">Mulai Lapor Sekarang &rarr;</a>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($reports as $report)
                                    <tr>
                                        <td class="py-3 px-4">
                                            <img src="{{ asset('storage/' . $report->image_path) }}" alt="Foto Laporan" class="h-16 w-16 object-cover rounded-md border">
                                        </td>
                                        
                                        <td class="py-3 px-4 text-sm text-gray-600">
                                            {{ $report->created_at->format('d M Y') }}
                                        </td>

                                        <td class="py-3 px-4">
                                            <p class="text-sm font-semibold text-gray-800">{{ $report->location }}</p>
                                            <p class="text-xs text-gray-500 truncate w-48">{{ $report->description }}</p>
                                        </td>

                                        <td class="py-3 px-4">
                                            @if($report->status == 'pending')
                                                <span class="px-2 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">
                                                    Pending
                                                </span>
                                            @elseif($report->status == 'process')
                                                <span class="px-2 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">
                                                    Diproses
                                                </span>
                                            @elseif($report->status == 'completed')
                                                <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                                    Selesai
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
