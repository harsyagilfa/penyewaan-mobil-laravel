<?php

namespace App\Http\Controllers\admin;

use App\Models\Merk;
use App\Models\Mobil;
use App\Models\Customer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $customer   = Customer::count();
        $mobil      = Mobil::count();
        $transaksi  = Transaksi::count();
        $merk       = Merk::count();
        return view('admin.dashboard',compact('mobil','customer','transaksi','merk'));
    }
}
