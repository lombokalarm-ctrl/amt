<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Jamaah - Amantubillahi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">
    <nav class="bg-blue-600 text-white p-4 shadow">
        <div class="max-w-7xl mx-auto flex justify-between">
            <div class="font-bold text-lg">Amantubillahi Portal</div>
            <div><a href="{{ route('portal.logout') }}" class="text-sm hover:underline">Logout</a></div>
        </div>
    </nav>
    <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-xl font-bold mb-4">Profil Jamaah</h3>
            <p><b>Nama:</b> {{ $jamaah->nama_lengkap }}</p>
            <p><b>No Paspor:</b> {{ $jamaah->no_paspor }}</p>
            <p><b>Status:</b> <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-sm uppercase">{{ $jamaah->status }}</span></p>
            <hr class="my-4">
            <p><b>Paket Diambil:</b> {{ $jamaah->paket->nama_paket ?? '-' }}</p>
            <p><b>Jadwal Keberangkatan:</b> {{ $jamaah->keberangkatan->tanggal_berangkat ?? 'Belum ditentukan' }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-xl font-bold mb-4">Riwayat Pembayaran</h3>
            <ul>
                @forelse($jamaah->pembayarans as $p)
                <li class="border-b py-2 flex justify-between">
                    <span>{{ $p->tanggal }} ({{ strtoupper($p->jenis_pembayaran) }})</span>
                    <span class="font-bold text-green-600">Rp {{ number_format($p->nominal,0,',','.') }}</span>
                </li>
                @empty
                <li class="text-gray-500">Belum ada data pembayaran.</li>
                @endforelse
            </ul>
        </div>
        <div class="bg-white p-6 rounded shadow md:col-span-2">
            <h3 class="text-xl font-bold mb-4">Dokumen Digital (E-Surat)</h3>
            <ul>
                @forelse($jamaah->suratKeluars as $surat)
                <li class="border-b py-3 flex justify-between items-center">
                    <div><b>{{ $surat->template->nama_template ?? 'Surat' }}</b><br><span class="text-sm text-gray-500">{{ $surat->nomor_surat }}</span></div>
                    <a href="/storage/{{ $surat->file_pdf_path }}" target="_blank" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm">Download PDF</a>
                </li>
                @empty
                <li class="text-gray-500">Belum ada surat elektronik untuk Anda.</li>
                @endforelse
            </ul>
        </div>
    </div>
</body>
</html>
