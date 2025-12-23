<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Data Donasi</h2>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto">
        <div class="bg-white shadow rounded-lg overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Nominal</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donations as $donation)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $donation->donor_name }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                        <td class="px-4 py-2">{{ $donation->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
