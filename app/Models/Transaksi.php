<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public $timestamps = true;
    protected $table = "transaksi";
    protected $fillable = [
        'customer_id',
        'mobil_id',
        'tanggal_peminjaman',
        'tanggal_kembali',
        'tanggal_pengembalian',
        'denda',
        'total_harga',
        'status_pengembalian',
        'status_pembayaran',
        'bukti_pembayaran'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

}
