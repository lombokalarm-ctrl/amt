<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Catat Transaksi</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <form action="{{ route('akuntansi.store') }}" method="POST">
            @csrf
            <div class="mb-4"><label class="block font-bold">Tanggal</label><input type="date" name="tanggal" class="border p-2 w-full" required value="{{ date('Y-m-d') }}"></div>
            <div class="mb-4"><label class="block font-bold">Jenis</label>
                <select name="jenis" class="border p-2 w-full"><option value="pemasukan">Pemasukan</option><option value="pengeluaran">Pengeluaran</option></select>
            </div>
            <div class="mb-4"><label class="block font-bold">Kategori (Operasional, Vendor, Gaji, dll)</label><input type="text" name="kategori" class="border p-2 w-full" required></div>
            <div class="mb-4"><label class="block font-bold">Nominal (Rp)</label><input type="number" name="nominal" class="border p-2 w-full" required></div>
            <div class="mb-4"><label class="block font-bold">Keterangan</label><textarea name="keterangan" class="border p-2 w-full"></textarea></div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Jurnal</button>
        </form>
    </div></div></div>
</x-app-layout>
