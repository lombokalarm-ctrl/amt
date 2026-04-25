<?php
namespace App\Http\Controllers;
use App\Models\Agen;
use Illuminate\Http\Request;
class AgenController extends Controller {
    public function index() { return view('agens.index', ['agens' => Agen::latest()->get()]); }
    public function create() { return view('agens.create'); }
    public function store(Request $request) {
        Agen::create($request->validate(['nama_agen' => 'required', 'no_telepon' => 'required', 'total_komisi' => 'nullable|numeric']));
        return redirect()->route('agens.index')->with('success', 'Agen ditambahkan.');
    }
    public function destroy(Agen $agen) { $agen->delete(); return back()->with('success', 'Agen dihapus.'); }
}
