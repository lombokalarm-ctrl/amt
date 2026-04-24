<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Jamaah extends Model {
    protected $fillable = ['paket_id', 'keberangkatan_id', 'nama_lengkap', 'no_paspor', 'tanggal_lahir', 'ktp_path', 'paspor_path', 'status'];
    public function paket() { return $this->belongsTo(Paket::class); }
    public function keberangkatan() { return $this->belongsTo(Keberangkatan::class); }
    public function pembayarans() { return $this->hasMany(Pembayaran::class); }
    public function suratKeluars() { return $this->hasMany(SuratKeluar::class); }
}
