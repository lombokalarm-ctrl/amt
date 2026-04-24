<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Buat Keberangkatan</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <form action="{{ route('keberangkatans.store') }}" method="POST">
            @csrf
            <div class="mb-4"><label class="block font-bold">Paket Travel</label>
                <select name="paket_id" class="border p-2 w-full" required>
                    @foreach($pakets as $p)<option value="{{ $p->id }}">{{ $p->nama_paket }}</option>@endforeach
                </select></div>
            <div class="mb-4"><label class="block font-bold">Nama Grup / Kloter</label><input type="text" name="nama_grup" class="border p-2 w-full" required></div>
            <div class="mb-4"><label class="block font-bold">Tanggal Berangkat</label><input type="date" name="tanggal_berangkat" class="border p-2 w-full" required></div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div></div></div>
</x-app-layout>
