<?php
namespace App\Http\Controllers;
use App\Models\SuratTemplate;
use Illuminate\Http\Request;
class SuratTemplateController extends Controller {
    public function index() { return view('surat_templates.index', ['templates' => SuratTemplate::latest()->get()]); }
    public function create() { return view('surat_templates.create'); }
    public function store(Request $request) {
        SuratTemplate::create($request->validate(['nama_template' => 'required', 'konten_html' => 'required']));
        return redirect()->route('surat_templates.index')->with('success', 'Sukses.');
    }
    public function destroy(SuratTemplate $suratTemplate) { $suratTemplate->delete(); return back()->with('success', 'Dihapus.'); }
}
