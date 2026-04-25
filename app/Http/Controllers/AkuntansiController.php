<?php
namespace App\Http\Controllers;
use App\Models\TransaksiKeuangan;
use Illuminate\Http\Request;
class AkuntansiController extends Controller {
    public function index() {
        $transaksis = TransaksiKeuangan::latest()->get();
        $saldo = $transaksis->where('jenis', 'pemasukan')->sum('nominal') - $transaksis->where('jenis', 'pengeluaran')->sum('nominal');
        return view('akuntansi.index', compact('transaksis', 'saldo'));
    }
    public function create() { return view('akuntansi.create'); }
    public function store(Request $request) {
        TransaksiKeuangan::create($request->validate([
            'tanggal' => 'required|date', 'jenis' => 'required|in:pemasukan,pengeluaran', 'kategori' => 'required', 'nominal' => 'required|numeric', 'keterangan' => 'nullable'
        ]));
        return redirect()->route('akuntansi.index')->with('success', 'Transaksi dicatat.');
    }
}
