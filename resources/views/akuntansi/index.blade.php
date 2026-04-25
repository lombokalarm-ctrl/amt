<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Buku Besar Akuntansi</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <div class="mb-4 flex justify-between">
            <a href="{{ route('akuntansi.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">Catat Transaksi Baru</a>
            <div class="text-xl font-bold">Saldo Berjalan: <span class="{{ $saldo >= 0 ? 'text-green-600' : 'text-red-600' }}">Rp {{ number_format($saldo,0,',','.') }}</span></div>
        </div>
        <table class="w-full text-left border-collapse mt-6">
            <thead><tr><th class="px-4 py-2 border-b">Tanggal</th><th class="px-4 py-2 border-b">Kategori</th><th class="px-4 py-2 border-b">Keterangan</th><th class="px-4 py-2 border-b">Masuk/Keluar</th></tr></thead>
            <tbody>
                @foreach($transaksis as $t)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $t->tanggal }}</td><td class="px-4 py-2 border-b">{{ $t->kategori }}</td><td class="px-4 py-2 border-b">{{ $t->keterangan }}</td>
                    <td class="px-4 py-2 border-b font-bold {{ $t->jenis=='pemasukan'?'text-green-600':'text-red-600' }}">
                        {{ $t->jenis=='pemasukan'?'+':'-' }} Rp {{ number_format($t->nominal,0,',','.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div></div></div>
</x-app-layout>
