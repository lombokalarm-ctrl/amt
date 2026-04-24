<?php
namespace App\Http\Controllers;
use App\Models\Jamaah;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class JamaahController extends Controller {
    public function index() { return view('jamaahs.index', ['jamaahs' => Jamaah::with('paket')->latest()->get()]); }
    public function create() { return view('jamaahs.create', ['pakets' => Paket::all()]); }
    public function store(Request $request) {
        $data = $request->validate([
            'paket_id' => 'required|exists:pakets,id', 'nama_lengkap' => 'required|string', 'no_paspor' => 'nullable', 'tanggal_lahir' => 'nullable|date', 'status' => 'required', 'ktp_path' => 'nullable|file', 'paspor_path' => 'nullable|file'
        ]);
        if($request->hasFile('ktp_path')) $data['ktp_path'] = $request->file('ktp_path')->store('dokumen', 'public');
        if($request->hasFile('paspor_path')) $data['paspor_path'] = $request->file('paspor_path')->store('dokumen', 'public');
        Jamaah::create($data); return redirect()->route('jamaahs.index')->with('success', 'Sukses.');
    }
    public function destroy(Jamaah $jamaah) { $jamaah->delete(); return back()->with('success', 'Dihapus.'); }
}
