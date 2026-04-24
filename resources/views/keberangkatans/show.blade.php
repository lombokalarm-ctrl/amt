<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Detail Manifest Keberangkatan</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
            <h3 class="text-lg font-bold">Informasi Grup</h3>
            <p>Nama Grup: {{ $keberangkatan->nama_grup }} | Paket: {{ $keberangkatan->paket->nama_paket ?? '-' }}</p>
        </div>
        <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
            <h3 class="text-lg font-bold mb-4">Tambahkan Jamaah ke Grup</h3>
            <form action="{{ route('keberangkatans.add-jamaah', $keberangkatan) }}" method="POST">
                @csrf
                <div class="flex gap-4">
                    <select name="jamaah_id" class="border p-2 w-1/2" required>
                        @foreach($availableJamaahs as $j)<option value="{{ $j->id }}">{{ $j->nama_lengkap }} ({{ $j->no_paspor }})</option>@endforeach
                    </select>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Tambahkan</button>
                </div>
            </form>
        </div>
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-bold mb-4">Daftar Jamaah (Manifest)</h3>
            <table class="w-full text-left border-collapse">
                <thead><tr><th class="border-b px-4 py-2">Nama</th><th class="border-b px-4 py-2">No Paspor</th><th class="border-b px-4 py-2">Status</th></tr></thead>
                <tbody>
                    @foreach($jamaahs as $j)
                    <tr><td class="border-b px-4 py-2">{{ $j->nama_lengkap }}</td><td class="border-b px-4 py-2">{{ $j->no_paspor ?? '-' }}</td><td class="border-b px-4 py-2">{{ $j->status }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div></div>
</x-app-layout>
