<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Tambah Jamaah</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <form action="{{ route('jamaahs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4"><label class="block font-bold">Paket</label>
                <select name="paket_id" class="border p-2 w-full" required>
                    @foreach($pakets as $p)<option value="{{ $p->id }}">{{ $p->nama_paket }}</option>@endforeach
                </select></div>
            <div class="mb-4"><label class="block font-bold">Nama Lengkap</label><input type="text" name="nama_lengkap" class="border p-2 w-full" required></div>
            <div class="mb-4"><label class="block font-bold">No Paspor</label><input type="text" name="no_paspor" class="border p-2 w-full"></div>
            <div class="mb-4"><label class="block font-bold">Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="border p-2 w-full"></div>
            <div class="mb-4"><label class="block font-bold">Status</label>
                <select name="status" class="border p-2 w-full" required>
                    <option value="prospek">Prospek</option><option value="dp">DP</option>
                    <option value="lunas">Lunas</option><option value="berangkat">Berangkat</option><option value="selesai">Selesai</option>
                </select></div>
            <div class="mb-4"><label class="block font-bold">KTP</label><input type="file" name="ktp_path" class="border p-2 w-full"></div>
            <div class="mb-4"><label class="block font-bold">Paspor</label><input type="file" name="paspor_path" class="border p-2 w-full"></div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div></div></div>
</x-app-layout>
