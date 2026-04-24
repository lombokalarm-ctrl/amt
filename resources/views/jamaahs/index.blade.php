<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Jamaah</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white shadow-sm sm:rounded-lg p-6">
        @if(session('success'))<div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>@endif
        <div class="mb-4"><a href="{{ route('jamaahs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a></div>
        <div class="overflow-x-auto"><table class="w-full text-left border-collapse">
            <thead><tr><th class="px-4 py-2 border-b">Paket</th>
<th class="px-4 py-2 border-b">Grup</th>
<th class="px-4 py-2 border-b">Nama Lengkap</th>
<th class="px-4 py-2 border-b">No Paspor</th>
<th class="px-4 py-2 border-b">Tanggal Lahir</th>
<th class="px-4 py-2 border-b">Status</th>
<th class="px-4 py-2 border-b">Aksi</th></tr></thead>
            <tbody>
                @foreach($jamaahs as $item)
                <tr><td class="px-4 py-2 border-b">{{ $item->paket?->nama_paket ?? '-' }}</td>
<td class="px-4 py-2 border-b">{{ $item->keberangkatan?->nama_keberangkatan ?? '-' }}</td>
<td class="px-4 py-2 border-b">{{ $item->nama_lengkap }}</td>
<td class="px-4 py-2 border-b">{{ $item->no_paspor }}</td>
<td class="px-4 py-2 border-b">{{ $item->tanggal_lahir }}</td>
<td class="px-4 py-2 border-b">{{ $item->status }}</td>
<td class="px-4 py-2 border-b">
                    <form action="{{ route('jamaahs.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?');">
                        @csrf @method('DELETE')<button type="submit" class="text-red-600 underline">Hapus</button>
                    </form></td></tr>
                @endforeach
            </tbody>
        </table></div>
    </div></div></div>
</x-app-layout>