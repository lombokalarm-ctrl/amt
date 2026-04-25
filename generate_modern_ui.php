<?php

$dir = __DIR__ . '/resources/views/';

// 1. Layout App (Sidebar Modern + FontAwesome + SweetAlert2)
$appLayout = <<<'HTML'
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Amantubillahi ERP') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; } </style>
</head>
<body class="antialiased overflow-hidden">
    <div class="flex h-screen bg-gray-100" x-data="{ sidebarOpen: false }">
        
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-slate-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center">
                    <i class="fa-solid fa-kaaba text-blue-500 text-3xl mr-3"></i>
                    <span class="text-white text-xl font-bold">Amantubillahi</span>
                </div>
            </div>
            <nav class="mt-10 px-4 space-y-2">
                <a class="flex items-center px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg {{ request()->routeIs('dashboard') ? 'bg-slate-800 text-white border-l-4 border-blue-500' : '' }}" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-chart-pie w-5"></i><span class="mx-3">Dashboard</span>
                </a>
                <a class="flex items-center px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg {{ request()->routeIs('jamaahs.*') ? 'bg-slate-800 text-white border-l-4 border-blue-500' : '' }}" href="{{ route('jamaahs.index') }}">
                    <i class="fa-solid fa-users w-5"></i><span class="mx-3">Data Jamaah</span>
                </a>
                <a class="flex items-center px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg {{ request()->routeIs('pakets.*') ? 'bg-slate-800 text-white border-l-4 border-blue-500' : '' }}" href="{{ route('pakets.index') }}">
                    <i class="fa-solid fa-box-open w-5"></i><span class="mx-3">Paket Travel</span>
                </a>
                <a class="flex items-center px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg {{ request()->routeIs('pembayarans.*') ? 'bg-slate-800 text-white border-l-4 border-blue-500' : '' }}" href="{{ route('pembayarans.index') }}">
                    <i class="fa-solid fa-money-bill-wave w-5"></i><span class="mx-3">Pembayaran</span>
                </a>
                <a class="flex items-center px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg {{ request()->routeIs('keberangkatans.*') ? 'bg-slate-800 text-white border-l-4 border-blue-500' : '' }}" href="{{ route('keberangkatans.index') }}">
                    <i class="fa-solid fa-plane-departure w-5"></i><span class="mx-3">Keberangkatan</span>
                </a>
                <a class="flex items-center px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg {{ request()->routeIs('akuntansi.*') ? 'bg-slate-800 text-white border-l-4 border-blue-500' : '' }}" href="{{ route('akuntansi.index') }}">
                    <i class="fa-solid fa-calculator w-5"></i><span class="mx-3">Akuntansi</span>
                </a>
                <a class="flex items-center px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg {{ request()->routeIs('agens.*') ? 'bg-slate-800 text-white border-l-4 border-blue-500' : '' }}" href="{{ route('agens.index') }}">
                    <i class="fa-solid fa-handshake w-5"></i><span class="mx-3">Agen Mitra</span>
                </a>
                <div class="pt-4 pb-2"><p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Modul Surat</p></div>
                <a class="flex items-center px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg {{ request()->routeIs('surat_templates.*') ? 'bg-slate-800 text-white border-l-4 border-blue-500' : '' }}" href="{{ route('surat_templates.index') }}">
                    <i class="fa-solid fa-file-code w-5"></i><span class="mx-3">Template HTML</span>
                </a>
                <a class="flex items-center px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg {{ request()->routeIs('surat_keluars.*') ? 'bg-slate-800 text-white border-l-4 border-blue-500' : '' }}" href="{{ route('surat_keluars.index') }}">
                    <i class="fa-solid fa-envelope-open-text w-5"></i><span class="mx-3">Generate Surat</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            <header class="flex justify-between items-center py-4 px-6 bg-white border-b border-gray-200">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800 ml-4 lg:ml-0">{{ $header ?? '' }}</h2>
                </div>
                <div class="flex items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover border-2 border-blue-500 mr-2" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff" alt="{{ Auth::user()->name }}">
                                <div>{{ Auth::user()->name }} <span class="text-xs text-gray-400 block">{{ ucfirst(Auth::user()->role) }}</span></div>
                                <div class="ml-1"><i class="fa-solid fa-chevron-down text-xs"></i></div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')"><i class="fa-solid fa-user mr-2"></i> Profil</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">@csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600"><i class="fa-solid fa-right-from-bracket mr-2"></i> Keluar</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
                <div class="container mx-auto px-6 py-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    
    @if(session('success'))
    <script>
        Swal.fire({ toast: true, position: 'top-end', icon: 'success', title: "{{ session('success') }}", showConfirmButton: false, timer: 3000, timerProgressBar: true });
    </script>
    @endif
</body>
</html>
HTML;
file_put_contents($dir . 'layouts/app.blade.php', $appLayout);

// 2. Dashboard Modern (Cards + Chart placeholder)
$dashboard = <<<'HTML'
<x-app-layout>
    <x-slot name="header">Ringkasan Eksekutif</x-slot>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center hover:shadow-md transition">
            <div class="p-4 rounded-full bg-blue-100 text-blue-600 mr-4"><i class="fa-solid fa-users text-2xl"></i></div>
            <div><p class="text-sm text-gray-500 font-semibold">Total Jamaah</p><p class="text-3xl font-bold text-gray-800">{{ $totalJamaah }}</p></div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center hover:shadow-md transition">
            <div class="p-4 rounded-full bg-green-100 text-green-600 mr-4"><i class="fa-solid fa-wallet text-2xl"></i></div>
            <div><p class="text-sm text-gray-500 font-semibold">Pemasukan (Lunas)</p><p class="text-2xl font-bold text-gray-800">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p></div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center hover:shadow-md transition">
            <div class="p-4 rounded-full bg-purple-100 text-purple-600 mr-4"><i class="fa-solid fa-plane text-2xl"></i></div>
            <div><p class="text-sm text-gray-500 font-semibold">Grup Keberangkatan</p><p class="text-3xl font-bold text-gray-800">Aktif</p></div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center hover:shadow-md transition">
            <div class="p-4 rounded-full bg-orange-100 text-orange-600 mr-4"><i class="fa-solid fa-file-pdf text-2xl"></i></div>
            <div><p class="text-sm text-gray-500 font-semibold">Surat Digenerate</p><p class="text-3xl font-bold text-gray-800">Auto</p></div>
        </div>
    </div>

    <!-- Quick Actions & Info -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2"><i class="fa-solid fa-bullhorn text-blue-500 mr-2"></i> Papan Pengumuman</h3>
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                <div class="flex"><div class="flex-shrink-0"><i class="fa-solid fa-info-circle text-blue-500"></i></div>
                <div class="ml-3"><p class="text-sm text-blue-700">Selamat datang di <b>Amantubillahi ERP versi 2.0</b>. Pembaruan meliputi UI/UX Modern dengan Tailwind CSS, Modul Akuntansi, Modul Agen Mitra, dan Portal Mandiri Jamaah.</p></div>
                </div>
            </div>
            <div class="mt-6 flex gap-4">
                <a href="{{ route('jamaahs.create') }}" class="px-4 py-2 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition shadow-sm"><i class="fa-solid fa-plus mr-2"></i> Jamaah Baru</a>
                <a href="{{ route('pembayarans.create') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition shadow-sm"><i class="fa-solid fa-receipt mr-2"></i> Catat Pembayaran</a>
            </div>
        </div>
        <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-xl shadow-md p-6 text-white relative overflow-hidden">
            <i class="fa-solid fa-kaaba absolute -bottom-4 -right-4 text-9xl opacity-20"></i>
            <h3 class="text-lg font-bold mb-2">Portal Jamaah</h3>
            <p class="text-blue-100 text-sm mb-6">Arahkan jamaah Anda untuk mengecek jadwal dan tagihan mereka secara mandiri melalui portal publik.</p>
            <a href="{{ route('portal.index') }}" target="_blank" class="inline-block px-4 py-2 bg-white text-blue-700 font-bold rounded-lg shadow hover:bg-blue-50 transition">Buka Portal <i class="fa-solid fa-external-link-alt ml-1"></i></a>
        </div>
    </div>
</x-app-layout>
HTML;
file_put_contents($dir . 'dashboard.blade.php', $dashboard);

// 3. Jamaahs Index (Beautiful Table with Badges)
$jamaahIndex = <<<'HTML'
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
HTML;
file_put_contents($dir . 'jamaahs/index.blade.php', $jamaahIndex);

// 4. Surat Templates Create (TinyMCE Rich Text Editor)
$suratCreate = <<<'HTML'
<x-app-layout>
    <x-slot name="header">Tambah Template Surat</x-slot>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 bg-gray-50">
            <h3 class="text-lg font-bold text-gray-800">Editor Template Generator</h3>
            <p class="text-sm text-gray-500">Gunakan Rich Text Editor untuk mendesain surat. Jangan lupa gunakan format <code>@{{nama_jamaah}}</code> untuk placeholder.</p>
        </div>
        <div class="p-6">
            <form action="{{ route('surat_templates.store') }}" method="POST">
                @csrf
                <div class="mb-6"><label class="block font-bold text-gray-700 mb-2">Nama Template</label>
                    <input type="text" name="nama_template" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm w-full p-3" placeholder="Contoh: Surat Rekomendasi Kemenag" required>
                </div>
                <div class="mb-6">
                    <label class="block font-bold text-gray-700 mb-2">Konten HTML Editor</label>
                    <div class="mb-2 flex gap-2">
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded cursor-pointer hover:bg-blue-200" onclick="tinymce.activeEditor.execCommand('mceInsertContent', false, '@{{nama_jamaah}}');">@{{nama_jamaah}}</span>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded cursor-pointer hover:bg-blue-200" onclick="tinymce.activeEditor.execCommand('mceInsertContent', false, '@{{no_paspor}}');">@{{no_paspor}}</span>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded cursor-pointer hover:bg-blue-200" onclick="tinymce.activeEditor.execCommand('mceInsertContent', false, '@{{tanggal_lahir}}');">@{{tanggal_lahir}}</span>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded cursor-pointer hover:bg-blue-200" onclick="tinymce.activeEditor.execCommand('mceInsertContent', false, '@{{nomor_surat}}');">@{{nomor_surat}}</span>
                    </div>
                    <textarea name="konten_html" id="editor" class="w-full h-96"></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold shadow-md hover:bg-blue-700 transition"><i class="fa-solid fa-save mr-2"></i> Simpan Template</button>
            </form>
        </div>
    </div>

    <!-- Script TinyMCE via CDN -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#editor',
        plugins: 'advlist autolink lists link image charmap preview anchor pagebreak table code help wordcount',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
      });
    </script>
</x-app-layout>
HTML;
file_put_contents($dir . 'surat_templates/create.blade.php', $suratCreate);

echo "Revamp Modern UI Applied Successfully!\n";
?>
