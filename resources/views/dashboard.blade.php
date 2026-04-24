<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard Amantubillahi ERP</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"><div class="p-6 flex items-center justify-between">
            <div><p class="text-sm text-gray-500 font-semibold uppercase">Total Jamaah</p><p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalJamaah }}</p></div>
        </div></div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"><div class="p-6 flex items-center justify-between">
            <div><p class="text-sm text-gray-500 font-semibold uppercase">Pemasukan Lunas</p><p class="text-3xl font-bold text-green-600 mt-2">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p></div>
        </div></div>
    </div>
    <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg"><div class="p-6 text-gray-900">
        <h3 class="text-lg font-bold mb-4">Selamat datang, {{ Auth::user()->name }}!</h3>
        <p>Gunakan menu navigasi di atas untuk mengelola sistem ERP sesuai Blueprint v2.</p>
    </div></div>
    </div></div>
</x-app-layout>
