<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginCustomerController extends Controller
{
    public function index()
    {

        return view('customer.login');
    }
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $credentials['hak_akses'] ='2';
        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->intended('customer/home');
        }
        Session::flash('status', 'gagal');
        Session::flash('message', 'Login invalid');
        return redirect('customer/login');
    }
    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('customer.login');
    }
}
