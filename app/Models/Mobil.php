<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $table = "mobil";
    protected $fillable = [
        'nama_mobil',
        'merk_id',
        'plat',
        'tahun_pembuatan',
        'warna',
        'kapasitas',
        'harga_sewa',
        'status',
        'gambar',
    ];
    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk_id');
    }
}
