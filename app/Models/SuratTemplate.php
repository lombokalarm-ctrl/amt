<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SuratTemplate extends Model {
    protected $fillable = ['nama_template', 'konten_html'];
    public function suratKeluars() { return $this->hasMany(SuratKeluar::class); }
}
