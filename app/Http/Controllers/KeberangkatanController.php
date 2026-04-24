<?php
namespace App\Http\Controllers;
use App\Models\Keberangkatan;
use App\Models\Paket;
use App\Models\Jamaah;
use Illuminate\Http\Request;
class KeberangkatanController extends Controller {
    public function index() { return view('keberangkatans.index', ['keberangkatans' => Keberangkatan::with('paket')->withCount('jamaahs')->latest()->get()]); }
    public function create() { return view('keberangkatans.create', ['pakets' => Paket::all()]); }
    public function store(Request $request) {
        Keberangkatan::create($request->validate(['paket_id' => 'required', 'nama_grup' => 'required', 'tanggal_berangkat' => 'required|date']));
        return redirect()->route('keberangkatans.index')->with('success', 'Sukses.');
    }
    public function show(Keberangkatan $keberangkatan) {
        $jamaahs = $keberangkatan->jamaahs;
        $availableJamaahs = Jamaah::where('paket_id', $keberangkatan->paket_id)->whereNull('keberangkatan_id')->get();
        return view('keberangkatans.show', compact('keberangkatan', 'jamaahs', 'availableJamaahs'));
    }
    public function addJamaah(Request $request, Keberangkatan $keberangkatan) {
        Jamaah::where('id', $request->jamaah_id)->update(['keberangkatan_id' => $keberangkatan->id]);
        return back()->with('success', 'Ditambahkan.');
    }
    public function destroy(Keberangkatan $keberangkatan) { $keberangkatan->delete(); return back()->with('success', 'Dihapus.'); }
}
