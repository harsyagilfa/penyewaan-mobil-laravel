<?php

namespace App\Http\Controllers\admin;

use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanTransaksiController extends Controller
{
    public function index(Request $request)
    {
        $mobil = Mobil::all(); // Mengambil semua data mobil
        $query = Transaksi::query();
        // Default laporan hanya transaksi yang status pembayaran "Lunas" dan status pengembalian "Kembali"
        $query->where('status_pembayaran', 'Lunas')
              ->where('status_pengembalian', 'Kembali');

        // Filter berdasarkan bulan dan tahun yang dipilih
        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal_peminjaman', $request->bulan);
        }

        if ($request->filled('tahun')) {
            $query->whereYear('tanggal_peminjaman', $request->tahun);
        }
         // Filter berdasarkan mobil
        if ($request->mobil_id) {
            $query->where('mobil_id', $request->mobil_id);
        }

        $transaksi = $query->get();
        return view('admin.laporan_transaksi',compact('transaksi','mobil'));
    }
    public function print_laporan_transaksi(Request $request)
    {
        $mobil = Mobil::all(); // Mengambil semua data mobil
        $query = Transaksi::query();
        $query->where('status_pembayaran', 'Lunas')
              ->where('status_pengembalian', 'Kembali');

        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal_peminjaman', $request->bulan);
        }
        if ($request->filled('tahun')) {
            $query->whereYear('tanggal_peminjaman', $request->tahun);
        }
        if ($request->mobil_id) {
            $query->where('mobil_id', $request->mobil_id);
        }
        $transaksi = $query->get();
        return view('admin.print_laporan_transaksi', compact('transaksi','mobil'));
    }
}
