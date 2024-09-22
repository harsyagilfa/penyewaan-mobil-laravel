<?php

namespace App\Http\Controllers\customer;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index($id)
    {
        $customer = Auth::guard('customer')->user();
        $transaksi = Transaksi::where('id', $id)->where('customer_id', $customer->id)->firstOrFail();
        return view('customer.pembayaran',compact('transaksi'));
    }
    public function invoice($id)
    {
        $customer = Auth::guard('customer')->user();
        $transaksi = Transaksi::where('id', $id)->where('customer_id', $customer->id)->firstOrFail();
        return view('customer.invoice_pembayaran',compact('transaksi'));
    }
    public function upload_bukti_pembayaran(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|mimes:jpg,png,pdf|max:2048',
            'id' => 'required|exists:transaksi,id' // Validasi ID transaksi
        ]);
        $transaksi = Transaksi::find($request->id);
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/upload/bukti_pembayaran', $filename);
            // Simpan nama file di database (contoh: pada tabel transaksi)
            $transaksi->bukti_pembayaran = $filename;
            $transaksi->save();
        }
        return redirect()->route('customer.transaksi')->with('status','Bukti Pembayaran Berhasil Diupload');
    }
}
