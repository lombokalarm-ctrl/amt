<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Tambah Template Surat</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <form action="{{ route('surat_templates.store') }}" method="POST">
            @csrf
            <div class="mb-4"><label class="block font-bold">Nama Template</label><input type="text" name="nama_template" class="border p-2 w-full" required></div>
            <div class="mb-4"><label class="block font-bold">Konten HTML (Placeholder: {{nama_jamaah}}, {{no_paspor}}, {{tanggal_lahir}})</label>
                <textarea name="konten_html" class="border p-2 w-full h-48" required></textarea></div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div></div></div>
</x-app-layout>
