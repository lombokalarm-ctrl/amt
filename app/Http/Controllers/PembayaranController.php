<?php
namespace App\Http\Controllers;
use App\Models\Pembayaran;
use App\Models\Jamaah;
use Illuminate\Http\Request;
class PembayaranController extends Controller {
    public function index() { return view('pembayarans.index', ['pembayarans' => Pembayaran::with('jamaah')->latest()->get()]); }
    public function create() { return view('pembayarans.create', ['jamaahs' => Jamaah::all()]); }
    public function store(Request $request) {
        Pembayaran::create($request->validate(['jamaah_id' => 'required', 'nominal' => 'required|numeric', 'jenis_pembayaran' => 'required', 'tanggal' => 'required', 'status' => 'required']));
        return redirect()->route('pembayarans.index')->with('success', 'Sukses.');
    }
    public function destroy(Pembayaran $pembayaran) { $pembayaran->delete(); return back()->with('success', 'Dihapus.'); }
}
