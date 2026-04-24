<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Pembayaran extends Model {
    protected $fillable = ['jamaah_id', 'nominal', 'jenis_pembayaran', 'tanggal', 'status'];
    public function jamaah() { return $this->belongsTo(Jamaah::class); }
}
