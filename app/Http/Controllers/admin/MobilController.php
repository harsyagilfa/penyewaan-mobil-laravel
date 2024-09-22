<?php

namespace App\Http\Controllers\admin;

use App\Models\Merk;
use App\Models\Mobil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    public function index()
    {
        $mobil = Mobil::with('merk')->get();
        return view('admin.mobil',compact('mobil'));
    }
    public function detail($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('admin.detail_mobil',compact('mobil'));
    }
    public function tambah_data()
    {
        $merk = Merk::all();
        return view('admin.crud.tambah_mobil',compact('merk'));
    }
    public function tambah_data_aksi(Request $request)
    {
        $request->validate([
            'nama_mobil' => 'required|string|max:255',
            'merk_id' => 'required|exists:merk,id',
            'warna' => 'required|string|max:255',
            'tahun_pembuatan' => 'required',
            'kapasitas' => 'required',
            'harga_sewa' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }
        // dd($data);
        Mobil::create($data);
        return redirect()->route('admin.mobil')->with('status', 'Data Mobil berhasil ditambahkan.');
    }
    public function update_data(Mobil $mobil ,$id)
    {
        $mobil= Mobil::where('id',$id)->first();
        $merk = Merk::all();
        return view('admin.crud.update_mobil',compact('mobil','merk'));
    }
    public function update_data_aksi(Request $request, $id)
    {
        $mobil = Mobil::findOrFail($id);
        $request->validate([
            'nama_mobil' => 'required|string|max:255',
            'merk_id' => 'required|exists:merk,id',
            'warna' => 'required|string|max:255',
            'tahun_pembuatan' => 'required',
            'kapasitas' => 'required',
            'harga_sewa' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($mobil->gambar) {
                Storage::delete('public/' . $mobil->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }
        // dd($data);
        $mobil->update($data);
        return redirect()->route('admin.mobil')->with('status', 'Data Mobil berhasil diubah.');
    }
    public function delete_data(Mobil $mobil, $id)
    {
        $mobil = Mobil::findOrFail($id);
        if ($mobil->gambar) {
            Storage::delete('public/' . $mobil->gambar);
        }
        $mobil->delete();
        return redirect()->route('admin.mobil')->with('delete', 'Data Mobil berhasil Dihapus.');
    }

}
