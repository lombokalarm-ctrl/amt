<?php
namespace App\Http\Controllers;
use App\Models\Jamaah;
use Illuminate\Http\Request;
class PortalJamaahController extends Controller {
    public function index() {
        return view('portal.login');
    }
    public function login(Request $request) {
        $request->validate(['no_paspor' => 'required', 'tanggal_lahir' => 'required|date']);
        $jamaah = Jamaah::where('no_paspor', $request->no_paspor)->where('tanggal_lahir', $request->tanggal_lahir)->first();
        if(!$jamaah) return back()->withErrors(['message' => 'Data Jamaah tidak ditemukan. Pastikan No Paspor dan Tanggal Lahir benar.']);
        
        session(['jamaah_id' => $jamaah->id]);
        return redirect()->route('portal.dashboard');
    }
    public function dashboard() {
        if(!session('jamaah_id')) return redirect()->route('portal.index');
        $jamaah = Jamaah::with(['paket', 'keberangkatan', 'pembayarans', 'suratKeluars'])->findOrFail(session('jamaah_id'));
        return view('portal.dashboard', compact('jamaah'));
    }
    public function logout() {
        session()->forget('jamaah_id');
        return redirect()->route('portal.index');
    }
}
