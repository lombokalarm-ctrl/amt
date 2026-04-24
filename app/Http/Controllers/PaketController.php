<?php
namespace App\Http\Controllers;
use App\Models\Paket;
use Illuminate\Http\Request;
class PaketController extends Controller {
    public function index() { return view('pakets.index', ['pakets' => Paket::latest()->get()]); }
    public function create() { return view('pakets.create'); }
    public function store(Request $request) {
        Paket::create($request->validate(['nama_paket' => 'required', 'harga' => 'required|numeric', 'durasi_hari' => 'required|numeric']));
        return redirect()->route('pakets.index')->with('success', 'Sukses.');
    }
    public function destroy(Paket $paket) { $paket->delete(); return back()->with('success', 'Dihapus.'); }
}
