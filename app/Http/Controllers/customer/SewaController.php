<?php

namespace App\Http\Controllers\customer;

use Carbon\Carbon;
use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SewaController extends Controller
{
    public function index(Mobil  $mobil)
    {
        $customer = Auth::guard('customer')->user();
        return view('customer.sewa_mobil',compact('mobil','customer'));
    }
    public function sewa_mobil_aksi(Request $request)
    {
        $request->validate([
            'tanggal_peminjaman' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_peminjaman',
        ]);
        $mobil = Mobil::findOrFail($request->mobil_id);
        $customer = Auth::guard('customer')->user();

        // Konversi tanggal ke objek Carbon
        $tanggal_peminjaman = Carbon::parse($request->tanggal_peminjaman);
        $tanggal_kembali    = Carbon::parse($request->tanggal_kembali);

        // Hitung lama peminjaman dalam hari
        $lama_peminjaman = $tanggal_kembali->diffInDays($tanggal_peminjaman);

        // Hitung total harga
        $total_harga = $lama_peminjaman * $mobil->harga_sewa;

        Transaksi::create([
            'customer_id' => $customer->id,
            'mobil_id' => $mobil->id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_kembali' => $request->tanggal_kembali,
            'total_harga' => $total_harga,
        ]);
        $mobil->status = 'Kosong';
        $mobil->save();
        return redirect()->route('customer.transaksi')->with('status','Transaksi Berhasil Ditambahkan');
    }
}
