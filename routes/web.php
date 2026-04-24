<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JamaahController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SuratTemplateController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\KeberangkatanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect()->route('login'); });

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('jamaahs', JamaahController::class);
    Route::resource('pakets', PaketController::class);
    Route::resource('pembayarans', PembayaranController::class);
    Route::resource('surat_templates', SuratTemplateController::class);
    
    Route::get('surat_keluars/{surat_keluar}/preview', [SuratKeluarController::class, 'preview'])->name('surat_keluars.preview');
    Route::get('surat_keluars/{surat_keluar}/download', [SuratKeluarController::class, 'download'])->name('surat_keluars.download');
    Route::resource('surat_keluars', SuratKeluarController::class);
    
    Route::resource('keberangkatans', KeberangkatanController::class);
    Route::post('keberangkatans/{keberangkatan}/add-jamaah', [KeberangkatanController::class, 'addJamaah'])->name('keberangkatans.add-jamaah');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
