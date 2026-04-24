<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Keberangkatan extends Model {
    protected $fillable = ['paket_id', 'nama_grup', 'tanggal_berangkat'];
    public function paket() { return $this->belongsTo(Paket::class); }
    public function jamaahs() { return $this->hasMany(Jamaah::class); }
}
