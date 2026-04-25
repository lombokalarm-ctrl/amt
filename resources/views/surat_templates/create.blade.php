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