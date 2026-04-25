<x-app-layout>
    <x-slot name="header">Daftar Jamaah</x-slot>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <h3 class="text-lg font-bold text-gray-800">Data Seluruh Jamaah</h3>
            <a href="{{ route('jamaahs.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-sm"><i class="fa-solid fa-plus mr-2"></i> Tambah Baru</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 text-sm uppercase font-semibold">
                    <tr><th class="px-6 py-4">Nama Lengkap</th><th class="px-6 py-4">No Paspor</th><th class="px-6 py-4">Paket (Grup)</th><th class="px-6 py-4">Status</th><th class="px-6 py-4 text-center">Aksi</th></tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @foreach($jamaahs as $item)
                    <tr class="hover:bg-blue-50 transition duration-150">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            <div class="flex items-center">
                                <img class="h-10 w-10 rounded-full object-cover mr-3" src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_lengkap) }}&background=random" alt="">
                                <div>{{ $item->nama_lengkap }}<br><span class="text-xs text-gray-400"><i class="fa-regular fa-calendar mr-1"></i>{{ $item->tanggal_lahir ?? '-' }}</span></div>
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ $item->no_paspor ?? '-' }}</td>
                        <td class="px-6 py-4"><b>{{ $item->paket?->nama_paket ?? '-' }}</b><br><span class="text-xs text-indigo-600">{{ $item->keberangkatan?->nama_grup ?? 'Belum ada grup' }}</span></td>
                        <td class="px-6 py-4">
                            @if($item->status == 'lunas' || $item->status == 'berangkat' || $item->status == 'selesai')
                                <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full uppercase tracking-wider"><i class="fa-solid fa-check-circle mr-1"></i>{{ $item->status }}</span>
                            @elseif($item->status == 'dp')
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full uppercase tracking-wider"><i class="fa-solid fa-clock mr-1"></i>{{ $item->status }}</span>
                            @else
                                <span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-bold rounded-full uppercase tracking-wider"><i class="fa-solid fa-user-clock mr-1"></i>{{ $item->status }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <form action="{{ route('jamaahs.destroy', $item) }}" method="POST" class="inline" id="form-delete-{{ $item->id }}">
                                @csrf @method('DELETE')
                                <button type="button" onclick="Swal.fire({title:'Hapus Data?', text:'Tindakan ini tidak bisa dibatalkan!', icon:'warning', showCancelButton:true, confirmButtonColor:'#d33', confirmButtonText:'Ya, Hapus!'}).then((result)=>{if(result.isConfirmed) document.getElementById('form-delete-{{ $item->id }}').submit()})" class="text-red-500 hover:text-red-700 bg-red-50 p-2 rounded-lg transition"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>