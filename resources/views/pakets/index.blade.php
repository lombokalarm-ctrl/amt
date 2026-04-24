<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Paket</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white shadow-sm sm:rounded-lg p-6">
        @if(session('success'))<div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>@endif
        <div class="mb-4"><a href="{{ route('pakets.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a></div>
        <div class="overflow-x-auto"><table class="w-full text-left border-collapse">
            <thead><tr><th class="px-4 py-2 border-b">Nama Paket</th>
<th class="px-4 py-2 border-b">Harga</th>
<th class="px-4 py-2 border-b">Durasi Hari</th>
<th class="px-4 py-2 border-b">Aksi</th></tr></thead>
            <tbody>
                @foreach($pakets as $item)
                <tr><td class="px-4 py-2 border-b">{{ $item->nama_paket }}</td>
<td class="px-4 py-2 border-b">{{ $item->harga }}</td>
<td class="px-4 py-2 border-b">{{ $item->durasi_hari }}</td>
<td class="px-4 py-2 border-b">
                    <form action="{{ route('pakets.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?');">
                        @csrf @method('DELETE')<button type="submit" class="text-red-600 underline">Hapus</button>
                    </form></td></tr>
                @endforeach
            </tbody>
        </table></div>
    </div></div></div>
</x-app-layout>