<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SuratKeluar extends Model {
    protected $fillable = ['jamaah_id', 'surat_template_id', 'nomor_surat', 'file_pdf_path', 'tanggal_dibuat'];
    public function jamaah() { return $this->belongsTo(Jamaah::class); }
    public function template() { return $this->belongsTo(SuratTemplate::class, 'surat_template_id'); }
}
