<?php

namespace App\Http\Controllers\customer;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiCustomerController extends Controller
{
    public function index()
    {
        $customer = Auth::guard('customer')->user();
        $transaksi = Transaksi::where('customer_id',$customer->id)->get();
        return view('customer.transaksi',compact('transaksi'));
    }
    public function hapus_transaksi($id)
    {
        // Temukan transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);
        // Temukan mobil yang terkait dengan transaksi
        $mobil = $transaksi->mobil;
        // Hapus transaksi
        $transaksi->delete();
        // Update status mobil menjadi "Tersedia"
        $mobil->status = 'Tersedia';
        $mobil->save();
        // Redirect dengan pesan sukses
        return redirect()->route('customer.transaksi')->with('status', 'Transaksi berhasil dibatalkan');
    }
}
