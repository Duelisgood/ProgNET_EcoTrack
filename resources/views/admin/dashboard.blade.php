<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard - Kelola Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">

                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-green-50">
                    <h3 class="font-bold text-green-900 text-lg">Daftar Masuk Laporan</h3>
                    <span class="bg-green-200 text-green-800 text-xs px-3 py-1 rounded-full font-bold">Total: {{ $reports->count() }}</span>
                </div>


            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-green-800 text-white">
                        <tr>
                            <th class="py-4 px-6 text-left text-xs font-semibold uppercase tracking-wider">Pelapor</th>
                            <th class="py-4 px-6 text-left text-xs font-semibold uppercase tracking-wider">Detail Lokasi</th>
                            <th class="py-4 px-6 text-center text-xs font-semibold uppercase tracking-wider">Bukti</th>
                            <th class="py-4 px-6 text-center text-xs font-semibold uppercase tracking-wider">Status</th>
                            <th class="py-4 px-6 text-center text-xs font-semibold uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($reports as $report)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-bold">
                                        {{ substr($report->user->name, 0, 1) }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $report->user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $report->user->email }}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="py-4 px-6">
                                <div class="text-sm text-gray-900 font-semibold">{{ $report->location }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ Str::limit($report->description, 40) }}</div>
                                <div class="text-xs text-gray-400 mt-1">{{ $report->created_at->format('d M Y') }}</div>
                            </td>

                            <td class="py-4 px-6 text-center" x-data="{ showModal: false }">
                                <button @click="showModal = true" class="text-blue-600 hover:text-blue-800 text-sm font-semibold underline decoration-dotted">
                                    Lihat Foto
                                </button>

                                <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4">
                                    <div @click.away="showModal = false" class="relative bg-white rounded-lg shadow-2xl max-w-3xl w-full overflow-hidden">
                                        <button @click="showModal = false" class="absolute top-2 right-2 bg-gray-800 text-white rounded-full p-2 hover:bg-gray-700 z-10">✕</button>
                                        <img src="{{ asset('storage/' . $report->image_path) }}" class="w-full h-auto object-contain max-h-[80vh]">
                                    </div>
                                </div>
                            </td>

                            <td class="py-4 px-6 text-center">
                                @if($report->status == 'pending')
                                <span class="inline-flex px-3 py-1 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full border border-yellow-200">Pending</span>
                                @elseif($report->status == 'process')
                                <span class="inline-flex px-3 py-1 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full border border-blue-200">Proses</span>
                                @else
                                <span class="inline-flex px-3 py-1 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full border border-green-200">Selesai</span>
                                @endif
                            </td>

                            <td class="py-4 px-6 text-center">
                                <form action="{{ route('admin.reports.update', $report) }}" method="POST" class="flex items-center justify-center space-x-2">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="text-xs border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 py-1 pl-2 pr-6">
                                        <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="process" {{ $report->status == 'process' ? 'selected' : '' }}>Proses</option>
                                        <option value="completed" {{ $report->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                    <button type="submit" class="bg-green-700 hover:bg-green-800 text-white p-1.5 rounded-md transition shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
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
</x-app-layout>