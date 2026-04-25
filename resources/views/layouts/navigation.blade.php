<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}"><x-application-logo class="block h-9 w-auto fill-current text-blue-600" /></a>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
                    <x-nav-link :href="route('jamaahs.index')" :active="request()->routeIs('jamaahs.*')">Jamaah</x-nav-link>
                    <x-nav-link :href="route('pakets.index')" :active="request()->routeIs('pakets.*')">Paket</x-nav-link>
                    <x-nav-link :href="route('pembayarans.index')" :active="request()->routeIs('pembayarans.*')">Pembayaran</x-nav-link>
                    <x-nav-link :href="route('surat_templates.index')" :active="request()->routeIs('surat_templates.*')">Template Surat</x-nav-link>
                    <x-nav-link :href="route('surat_keluars.index')" :active="request()->routeIs('surat_keluars.*')">Surat Keluar</x-nav-link>
                    <x-nav-link :href="route('keberangkatans.index')" :active="request()->routeIs('keberangkatans.*')">Keberangkatan</x-nav-link>
                    <x-nav-link :href="route('akuntansi.index')" :active="request()->routeIs('akuntansi.*')">Akuntansi</x-nav-link>
                    <x-nav-link :href="route('agens.index')" :active="request()->routeIs('agens.*')">Agen Mitra</x-nav-link>
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700">
                            <div>{{ Auth::user()->name }} ({{ ucfirst(Auth::user()->role) }})</div>
                            <div class="ms-1"><svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">@csrf<x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link></form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
