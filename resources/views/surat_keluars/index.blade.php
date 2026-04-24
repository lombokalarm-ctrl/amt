<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Surat Keluar</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white shadow-sm sm:rounded-lg p-6">
        @if(session('success'))<div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>@endif
        <div class="mb-4"><a href="{{ route('surat_keluars.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a></div>
        <div class="overflow-x-auto"><table class="w-full text-left border-collapse">
            <thead><tr><th class="px-4 py-2 border-b">Jamaah</th>
<th class="px-4 py-2 border-b">Template</th>
<th class="px-4 py-2 border-b">Nomor Surat</th>
<th class="px-4 py-2 border-b">Tanggal Dibuat</th>
<th class="px-4 py-2 border-b">Aksi</th></tr></thead>
            <tbody>
                @foreach($surat_keluars as $item)
                <tr><td class="px-4 py-2 border-b">{{ $item->jamaah?->nama_lengkap ?? '-' }}</td>
<td class="px-4 py-2 border-b">{{ $item->template?->nama_template ?? '-' }}</td>
<td class="px-4 py-2 border-b">{{ $item->nomor_surat }}</td>
<td class="px-4 py-2 border-b">{{ $item->tanggal_dibuat }}</td>
<td class="px-4 py-2 border-b"><a href="{{ route('surat_keluars.preview', $item) }}" target="_blank" class="text-green-600 underline mr-2">Preview</a>
                        <a href="{{ route('surat_keluars.download', $item) }}" class="text-purple-600 underline mr-2">Download</a>
                    <form action="{{ route('surat_keluars.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?');">
                        @csrf @method('DELETE')<button type="submit" class="text-red-600 underline">Hapus</button>
                    </form></td></tr>
                @endforeach
            </tbody>
        </table></div>
    </div></div></div>
</x-app-layout>