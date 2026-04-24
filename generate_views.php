<?php
$modules = [
    'jamaahs' => [
        'title' => 'Jamaah',
        'fields' => ['nama_lengkap', 'no_paspor', 'tanggal_lahir', 'status'],
        'relations' => ['paket_id' => 'Paket', 'keberangkatan_id' => 'Grup']
    ],
    'pakets' => [
        'title' => 'Paket',
        'fields' => ['nama_paket', 'harga', 'durasi_hari'],
        'relations' => []
    ],
    'pembayarans' => [
        'title' => 'Pembayaran',
        'fields' => ['nominal', 'jenis_pembayaran', 'tanggal', 'status'],
        'relations' => ['jamaah_id' => 'Jamaah']
    ],
    'surat_templates' => [
        'title' => 'Template Surat',
        'fields' => ['nama_template'],
        'relations' => []
    ],
    'surat_keluars' => [
        'title' => 'Surat Keluar',
        'fields' => ['nomor_surat', 'tanggal_dibuat'],
        'relations' => ['jamaah_id' => 'Jamaah', 'surat_template_id' => 'Template']
    ],
    'keberangkatans' => [
        'title' => 'Keberangkatan / Grup',
        'fields' => ['nama_grup', 'tanggal_berangkat'],
        'relations' => ['paket_id' => 'Paket']
    ],
];
foreach ($modules as $folder => $config) {
    $dir = __DIR__ . '/resources/views/' . $folder;
    if (!is_dir($dir)) mkdir($dir, 0777, true);
    
    // Index
    $headers = ''; $rows = '';
    foreach ($config['relations'] as $fk => $label) {
        $headers .= "<th class=\"px-4 py-2 border-b\">$label</th>\n";
        $relName = str_replace('_id', '', $fk);
        if ($relName == 'surat_template') $relName = 'template';
        $prop = $relName == 'paket' ? 'nama_paket' : ($relName == 'jamaah' ? 'nama_lengkap' : 'nama_'.$relName);
        $rows .= "<td class=\"px-4 py-2 border-b\">{{ \$item->$relName?->$prop ?? '-' }}</td>\n";
    }
    foreach ($config['fields'] as $f) {
        $headers .= "<th class=\"px-4 py-2 border-b\">" . ucwords(str_replace('_', ' ', $f)) . "</th>\n";
        $rows .= "<td class=\"px-4 py-2 border-b\">{{ \$item->$f }}</td>\n";
    }
    
    $extraAction = '';
    if ($folder == 'surat_keluars') {
        $extraAction = "<a href=\"{{ route('$folder.preview', \$item) }}\" target=\"_blank\" class=\"text-green-600 underline mr-2\">Preview</a>
                        <a href=\"{{ route('$folder.download', \$item) }}\" class=\"text-purple-600 underline mr-2\">Download</a>";
    }
    if ($folder == 'keberangkatans') {
        $extraAction = "<a href=\"{{ route('$folder.show', \$item) }}\" class=\"text-indigo-600 underline mr-2\">Atur Jamaah</a>";
    }
    
    $indexBlade = <<<BLADE
<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Data {$config['title']}</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white shadow-sm sm:rounded-lg p-6">
        @if(session('success'))<div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>@endif
        <div class="mb-4"><a href="{{ route('$folder.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a></div>
        <div class="overflow-x-auto"><table class="w-full text-left border-collapse">
            <thead><tr>$headers<th class="px-4 py-2 border-b">Aksi</th></tr></thead>
            <tbody>
                @foreach(\$$folder as \$item)
                <tr>$rows<td class="px-4 py-2 border-b">$extraAction
                    <form action="{{ route('$folder.destroy', \$item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?');">
                        @csrf @method('DELETE')<button type="submit" class="text-red-600 underline">Hapus</button>
                    </form></td></tr>
                @endforeach
            </tbody>
        </table></div>
    </div></div></div>
</x-app-layout>
BLADE;
    file_put_contents($dir . '/index.blade.php', $indexBlade);
}
