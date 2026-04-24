<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Catat Pembayaran</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <form action="{{ route('pembayarans.store') }}" method="POST">
            @csrf
            <div class="mb-4"><label class="block font-bold">Jamaah</label>
                <select name="jamaah_id" class="border p-2 w-full" required>
                    @foreach($jamaahs as $j)<option value="{{ $j->id }}">{{ $j->nama_lengkap }}</option>@endforeach
                </select></div>
            <div class="mb-4"><label class="block font-bold">Nominal</label><input type="number" name="nominal" class="border p-2 w-full" required></div>
            <div class="mb-4"><label class="block font-bold">Jenis</label>
                <select name="jenis_pembayaran" class="border p-2 w-full" required><option value="dp">DP</option><option value="pelunasan">Pelunasan</option></select></div>
            <div class="mb-4"><label class="block font-bold">Tanggal</label><input type="date" name="tanggal" class="border p-2 w-full" required value="{{ date('Y-m-d') }}"></div>
            <div class="mb-4"><label class="block font-bold">Status</label>
                <select name="status" class="border p-2 w-full" required><option value="lunas">Lunas</option><option value="cicil">Cicil</option></select></div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div></div></div>
</x-app-layout>
