<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Paket extends Model {
    protected $fillable = ['nama_paket', 'harga', 'durasi_hari'];
    public function jamaahs() { return $this->hasMany(Jamaah::class); }
    public function keberangkatans() { return $this->hasMany(Keberangkatan::class); }
}
