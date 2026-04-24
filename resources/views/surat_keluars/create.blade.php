<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Generate Surat Keluar</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <form action="{{ route('surat_keluars.store') }}" method="POST">
            @csrf
            <div class="mb-4"><label class="block font-bold">Pilih Jamaah</label>
                <select name="jamaah_id" class="border p-2 w-full" required>
                    @foreach($jamaahs as $j)<option value="{{ $j->id }}">{{ $j->nama_lengkap }}</option>@endforeach
                </select></div>
            <div class="mb-4"><label class="block font-bold">Pilih Template</label>
                <select name="surat_template_id" class="border p-2 w-full" required>
                    @foreach($templates as $t)<option value="{{ $t->id }}">{{ $t->nama_template }}</option>@endforeach
                </select></div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Generate PDF</button>
        </form>
    </div></div></div>
</x-app-layout>
