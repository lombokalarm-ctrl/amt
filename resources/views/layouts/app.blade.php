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