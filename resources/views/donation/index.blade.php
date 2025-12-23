<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Donasi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl p-6">

                @if(session('success'))
                <div class="mb-4 rounded-lg bg-green-100 text-green-700 px-4 py-2 text-sm">
                    {{ session('success') }}
                </div>
                @endif

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