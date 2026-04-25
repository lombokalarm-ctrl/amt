<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Manajemen Agen</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <div class="mb-4"><a href="{{ route('agens.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Agen</a></div>
        <table class="w-full text-left border-collapse">
            <thead><tr><th class="px-4 py-2 border-b">Nama Agen</th><th class="px-4 py-2 border-b">No Telepon</th><th class="px-4 py-2 border-b">Total Komisi</th><th class="px-4 py-2 border-b">Aksi</th></tr></thead>
            <tbody>
                @foreach($agens as $agen)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $agen->nama_agen }}</td><td class="px-4 py-2 border-b">{{ $agen->no_telepon }}</td><td class="px-4 py-2 border-b">Rp {{ number_format($agen->total_komisi,0,',','.') }}</td>
                    <td class="px-4 py-2 border-b">
                        <form action="{{ route('agens.destroy', $agen) }}" method="POST" onsubmit="return confirm('Hapus?');">@csrf @method('DELETE')<button class="text-red-600">Hapus</button></form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div></div></div>
</x-app-layout>
