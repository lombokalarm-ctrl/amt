<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Jamaah - Amantubillahi ERP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Portal Layanan Jamaah</h2>
        @if($errors->any())<div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ $errors->first() }}</div>@endif
        <form action="{{ route('portal.login.submit') }}" method="POST">
            @csrf
            <div class="mb-4"><label class="block font-bold">Nomor Paspor</label>
                <input type="text" name="no_paspor" class="w-full border p-2 rounded" placeholder="Masukkan nomor paspor Anda" required>
            </div>
            <div class="mb-6"><label class="block font-bold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full border p-2 rounded" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded">Masuk Portal</button>
        </form>
        <p class="text-sm text-center text-gray-500 mt-6">Masuk menggunakan data yang didaftarkan oleh agen Anda.</p>
    </div>
</body>
</html>
