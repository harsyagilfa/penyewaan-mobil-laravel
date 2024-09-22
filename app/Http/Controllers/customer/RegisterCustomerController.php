<?php

namespace App\Http\Controllers\customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterCustomerController extends Controller
{
    public function index()
    {
        return view('customer.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'usia' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'username' => 'required|max:255|unique:customer',
            'password' => 'required|max:255',
        ]);
        $customer = Customer::create([
            'nama_customer' => $request->nama_customer,
            'usia' => $request->usia,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        Session::flash('sukses', 'success');
        Session::flash('message', 'Register Berhasil,Silahkan login');
        return redirect()->route('customer.login');
    }
}
