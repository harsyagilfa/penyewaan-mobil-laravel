<?php

namespace App\Http\Controllers\customer;

use App\Models\Mobil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayananController extends Controller
{
    public function index()
    {
        $mobil = Mobil::with('merk')->get();
        return view('customer.layanan_mobil',compact('mobil'));
    }
    public function detail($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('customer.detail_mobil',compact('mobil'));
    }
    public function sewa($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('customer.sewa_mobil',compact('mobil'));
    }
}
