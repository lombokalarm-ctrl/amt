<x-app-layout>
    <x-slot name="header">Ringkasan Eksekutif</x-slot>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center hover:shadow-md transition">
            <div class="p-4 rounded-full bg-blue-100 text-blue-600 mr-4"><i class="fa-solid fa-users text-2xl"></i></div>
            <div><p class="text-sm text-gray-500 font-semibold">Total Jamaah</p><p class="text-3xl font-bold text-gray-800">{{ $totalJamaah }}</p></div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center hover:shadow-md transition">
            <div class="p-4 rounded-full bg-green-100 text-green-600 mr-4"><i class="fa-solid fa-wallet text-2xl"></i></div>
            <div><p class="text-sm text-gray-500 font-semibold">Pemasukan (Lunas)</p><p class="text-2xl font-bold text-gray-800">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p></div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center hover:shadow-md transition">
            <div class="p-4 rounded-full bg-purple-100 text-purple-600 mr-4"><i class="fa-solid fa-plane text-2xl"></i></div>
            <div><p class="text-sm text-gray-500 font-semibold">Grup Keberangkatan</p><p class="text-3xl font-bold text-gray-800">Aktif</p></div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center hover:shadow-md transition">
            <div class="p-4 rounded-full bg-orange-100 text-orange-600 mr-4"><i class="fa-solid fa-file-pdf text-2xl"></i></div>
            <div><p class="text-sm text-gray-500 font-semibold">Surat Digenerate</p><p class="text-3xl font-bold text-gray-800">Auto</p></div>
        </div>
    </div>

    <!-- Quick Actions & Info -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2"><i class="fa-solid fa-bullhorn text-blue-500 mr-2"></i> Papan Pengumuman</h3>
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                <div class="flex"><div class="flex-shrink-0"><i class="fa-solid fa-info-circle text-blue-500"></i></div>
                <div class="ml-3"><p class="text-sm text-blue-700">Selamat datang di <b>Amantubillahi ERP versi 2.0</b>. Pembaruan meliputi UI/UX Modern dengan Tailwind CSS, Modul Akuntansi, Modul Agen Mitra, dan Portal Mandiri Jamaah.</p></div>
                </div>
            </div>
            <div class="mt-6 flex gap-4">
                <a href="{{ route('jamaahs.create') }}" class="px-4 py-2 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition shadow-sm"><i class="fa-solid fa-plus mr-2"></i> Jamaah Baru</a>
                <a href="{{ route('pembayarans.create') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition shadow-sm"><i class="fa-solid fa-receipt mr-2"></i> Catat Pembayaran</a>
            </div>
        </div>
        <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-xl shadow-md p-6 text-white relative overflow-hidden">
            <i class="fa-solid fa-kaaba absolute -bottom-4 -right-4 text-9xl opacity-20"></i>
            <h3 class="text-lg font-bold mb-2">Portal Jamaah</h3>
            <p class="text-blue-100 text-sm mb-6">Arahkan jamaah Anda untuk mengecek jadwal dan tagihan mereka secara mandiri melalui portal publik.</p>
            <a href="{{ route('portal.index') }}" target="_blank" class="inline-block px-4 py-2 bg-white text-blue-700 font-bold rounded-lg shadow hover:bg-blue-50 transition">Buka Portal <i class="fa-solid fa-external-link-alt ml-1"></i></a>
        </div>
    </div>
</x-app-layout>