<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TransaksiAdminController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('admin.transaksi',['transaksi' => $transaksi]);
    }
    public function detail($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('admin.detail_transaksi',compact('transaksi'));
    }
    public function download_bukti_pembayaran($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        if ($transaksi->bukti_pembayaran) {
            return Storage::download('public/upload/bukti_pembayaran/' . $transaksi->bukti_pembayaran);
        } else {
            return redirect()->back()->with('error', 'Bukti pembayaran belum diupload');
        }
    }
    public function konfirmasi_pembayaran($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('admin.konfirmasi_pembayaran',compact('transaksi'));
    }
    public function konfirmasi_pembayaran_aksi(Request $request , $id)
    {
        $transaksi= Transaksi::findOrFail($id);
        $transaksi->status_pembayaran = "Lunas";
        $transaksi->save();
        return redirect()->route('admin.transaksi')->with('success','Pembayaran Berhasil Dikonfirmasi');
    }
    public function pengembalian_mobil($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('admin.pengembalian_mobil',compact('transaksi'));
    }
    public function pengembalian_mobil_aksi(Request $request ,$id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $mobil = Mobil::findOrFail($transaksi->mobil_id);

         // Set tanggal pengembalian dari form
         $tanggalPengembalian = Carbon::parse($request->tanggal_pengembalian);
         $tanggalKembali = Carbon::parse($transaksi->tanggal_kembali);

         // Jika pengembalian telat, hitung denda
         $denda ='0';
         if ($tanggalPengembalian->greaterThan($tanggalKembali)) {
            $terlambat = $tanggalPengembalian->diffInDays($tanggalKembali);
            $denda = $terlambat * 50000;
         }
         // Update status pengembalian dan denda di transaksi
        $transaksi->tanggal_pengembalian = $tanggalPengembalian;
        $transaksi->denda = $denda;
        $transaksi->status_pengembalian = 'Kembali';
        $transaksi->save();
        // Ubah status mobil menjadi "Tersedia"
        $mobil->status = 'Tersedia';
        $mobil->save();
        return redirect()->route('admin.transaksi')->with('success', 'Mobil Sudah dikembalikan.');
    }
}
