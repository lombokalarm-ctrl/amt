<?php
namespace App\Http\Controllers;
use App\Models\Jamaah;
use App\Models\Pembayaran;

class DashboardController extends Controller {
    public function index() {
        $totalJamaah = Jamaah::count();
        $totalPemasukan = Pembayaran::where('status', 'lunas')->sum('nominal');
        return view('dashboard', compact('totalJamaah', 'totalPemasukan'));
    }
}
