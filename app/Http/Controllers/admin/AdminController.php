<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function edit_profil()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.edit_profil',compact('admin'));
    }
    public function edit_profil_aksi(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:admin,username,',
            'password' => 'nullable|max:255', // password konfirmasi wajib
        ]);
        $admin = Auth::guard('admin')->user();
        $admin->username = $request->username;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Username atau password berhasil diubah. Silakan login kembali.');
        return redirect()->route('admin.login');
    }
}
