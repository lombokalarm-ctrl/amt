<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Tambah Agen</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <form action="{{ route('agens.store') }}" method="POST">
            @csrf
            <div class="mb-4"><label class="block font-bold">Nama Agen</label><input type="text" name="nama_agen" class="border p-2 w-full" required></div>
            <div class="mb-4"><label class="block font-bold">No Telepon</label><input type="text" name="no_telepon" class="border p-2 w-full" required></div>
            <div class="mb-4"><label class="block font-bold">Saldo Komisi Awal (Opsional)</label><input type="number" name="total_komisi" class="border p-2 w-full" value="0"></div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div></div></div>
</x-app-layout>
