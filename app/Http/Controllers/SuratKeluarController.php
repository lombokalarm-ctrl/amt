<?php
namespace App\Http\Controllers;
use App\Models\SuratKeluar;
use App\Models\Jamaah;
use App\Models\SuratTemplate;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class SuratKeluarController extends Controller {
    public function index() { return view('surat_keluars.index', ['suratKeluars' => SuratKeluar::with(['jamaah', 'template'])->latest()->get()]); }
    public function create() { return view('surat_keluars.create', ['jamaahs' => Jamaah::all(), 'templates' => SuratTemplate::all()]); }
    public function store(Request $request) {
        $request->validate(['jamaah_id' => 'required', 'surat_template_id' => 'required']);
        $jamaah = Jamaah::findOrFail($request->jamaah_id);
        $template = SuratTemplate::findOrFail($request->surat_template_id);
        $nomorSurat = 'AMN/' . date('Y/m/d/') . strtoupper(Str::random(5));
        
        $html = $template->konten_html;
        $html = str_replace('{{nama_jamaah}}', $jamaah->nama_lengkap, $html);
        $html = str_replace('{{no_paspor}}', $jamaah->no_paspor ?? '-', $html);
        $html = str_replace('{{tanggal_lahir}}', $jamaah->tanggal_lahir ? \Carbon\Carbon::parse($jamaah->tanggal_lahir)->format('d F Y') : '-', $html);
        $html = str_replace('{{nomor_surat}}', $nomorSurat, $html);
        $html = str_replace('{{tanggal_hari_ini}}', date('d F Y'), $html);
        
        $pdf = Pdf::loadHTML($html);
        $fileName = 'surat_keluar_' . time() . '.pdf';
        Storage::disk('public')->put('surat_keluar/' . $fileName, $pdf->output());
        
        SuratKeluar::create(['jamaah_id' => $jamaah->id, 'surat_template_id' => $template->id, 'nomor_surat' => $nomorSurat, 'file_pdf_path' => 'surat_keluar/' . $fileName, 'tanggal_dibuat' => date('Y-m-d')]);
        return redirect()->route('surat_keluars.index')->with('success', 'Surat PDF berhasil di-generate.');
    }
    public function preview(SuratKeluar $suratKeluar) {
        if(!Storage::disk('public')->exists($suratKeluar->file_pdf_path)) abort(404);
        return response()->file(storage_path('app/public/' . $suratKeluar->file_pdf_path));
    }
    public function download(SuratKeluar $suratKeluar) {
        if(!Storage::disk('public')->exists($suratKeluar->file_pdf_path)) abort(404);
        return response()->download(storage_path('app/public/' . $suratKeluar->file_pdf_path));
    }
    public function destroy(SuratKeluar $suratKeluar) {
        if($suratKeluar->file_pdf_path) Storage::disk('public')->delete($suratKeluar->file_pdf_path);
        $suratKeluar->delete(); return back()->with('success', 'Dihapus.');
    }
}
