<?php

namespace App\Http\Controllers\customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilCustomerController extends Controller
{
    public function index()
    {
        $customer = Auth::guard('customer')->user();
        return view('customer.profil',compact('customer'));
    }
    public function update_data()
    {
        $customer = Auth::guard('customer')->user();
        return view('customer.edit_profil',compact('customer'));
    }
    public function update_data_aksi(Request $request)
    {
        $customer = Auth::guard('customer')->user();
        // Simpan data customer

        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'usia' => 'required',
            'no_telepon' => 'required|string|max:150',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:100',
            'nik' => 'required|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'foto_sim' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        // Upload foto profil jika ada
        if ($request->hasFile('foto_profil')) {
            // Hapus foto profil lama jika ada
            if ($customer->foto_profil) {
                Storage::delete('public/customer/profil/' . $customer->foto_profil);
            }
            $fotoProfilName = time() . '_profil.' . $request->foto_profil->extension();
            $request->foto_profil->storeAs('public/customer/profil/', $fotoProfilName);
            $customer->foto_profil = $fotoProfilName;
        }

        // Upload foto SIM jika ada
        if ($request->hasFile('foto_sim')) {
            // Hapus foto SIM lama jika ada
            if ($customer->foto_sim) {
                Storage::delete('public/customer/sim/' . $customer->foto_sim);
            }
            $fotoSimName = time() . '_sim.' . $request->foto_sim->extension();
            $request->foto_sim->storeAs('public/customer/sim', $fotoSimName);
            $customer->foto_sim = $fotoSimName;
        }
        $customer->nama_customer = $request->nama_customer;
        $customer->usia = $request->usia;
        $customer->no_telepon = $request->no_telepon;
        $customer->alamat = $request->alamat;
        $customer->pekerjaan = $request->pekerjaan;
        $customer->nik = $request->nik;
        $customer->save();
        return redirect()->route('customer.profil')->with('status','Data Profil Berhasil Diperbarui');
    }
}
