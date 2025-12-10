<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard - Kelola Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left font-bold text-gray-600">Pelapor</th>
                                    <th class="py-3 px-4 text-left font-bold text-gray-600">Lokasi & Foto</th>
                                    <th class="py-3 px-4 text-left font-bold text-gray-600">Tanggal</th>
                                    <th class="py-3 px-4 text-left font-bold text-gray-600">Status Saat Ini</th>
                                    <th class="py-3 px-4 text-left font-bold text-gray-600">Ubah Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($reports as $report)
                                <tr>
                                    <td class="py-3 px-4 align-top">
                                        <div class="font-semibold">{{ $report->user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $report->user->email }}</div>
                                    </td>

                                    <td class="py-3 px-4 align-top" x-data="{ showModal: false }">
    
                    <div class="mb-2">
                        <button @click="showModal = true" 
                                class="inline-flex items-center gap-1 px-3 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-full border border-blue-200 hover:bg-blue-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Lihat Foto
                        </button>
                    </div>

                    <p class="text-sm text-gray-700 font-medium">{{ $report->location }}</p>
                    <p class="text-xs text-gray-500 italic">"{{ $report->description }}"</p>


                    <div x-show="showModal" 
                        style="display: none;"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0">
                        
                        <div @click.away="showModal = false" class="relative bg-white rounded-lg shadow-2xl max-w-4xl max-h-[90vh] overflow-auto">
                            
                            <button @click="showModal = false" class="absolute top-2 right-2 bg-black/50 text-white rounded-full p-2 hover:bg-red-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <img src="{{ asset('storage/' . $report->image_path) }}" 
                                alt="Bukti Laporan" 
                                class="w-full h-auto object-contain">
                                
                            <div class="p-4 bg-gray-50 border-t">
                                <p class="font-bold text-gray-800">Lokasi: {{ $report->location }}</p>
                                <p class="text-sm text-gray-600">{{ $report->description }}</p>
                            </div>
                        </div>
                    </div>

                </td>

                                    <td class="py-3 px-4 align-top text-sm">
                                        {{ $report->created_at->format('d M Y H:i') }}
                                    </td>

                                    <td class="py-3 px-4 align-top">
                                        @if($report->status == 'pending')
                                            <span class="px-2 py-1 text-xs font-bold text-yellow-700 bg-yellow-100 rounded-full">Pending</span>
                                        @elseif($report->status == 'process')
                                            <span class="px-2 py-1 text-xs font-bold text-blue-700 bg-blue-100 rounded-full">Diproses</span>
                                        @else
                                            <span class="px-2 py-1 text-xs font-bold text-green-700 bg-green-100 rounded-full">Selesai</span>
                                        @endif
                                    </td>

                                    <td class="py-3 px-4 align-top">
                                        <form action="{{ route('admin.reports.update', $report) }}" method="POST" class="flex flex-col gap-2">
                                            @csrf
                                            @method('PATCH') <select name="status" class="text-sm border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                                                <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="process" {{ $report->status == 'process' ? 'selected' : '' }}>Proses</option>
                                                <option value="completed" {{ $report->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                            </select>

                                            <button type="submit" class="bg-green-700 text-white text-xs font-bold py-1 px-3 rounded hover:bg-green-800 transition">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>