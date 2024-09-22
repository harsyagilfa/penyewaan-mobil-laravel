<?php

namespace App\Http\Controllers\admin;

use App\Models\Merk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerkController extends Controller
{
    public function index()
    {
        $merk_get = Merk::all();
        return view('admin.merk',[ 'merk_get' => $merk_get]);
    }
    public function tambah_data()
    {
        return view('admin.crud.tambah_merk');
    }
    public function tambah_data_aksi(Request $request)
    {
        $validate = $request->validate([
            'nama_merk' => 'required|unique:merk|max:100',
        ]);
        $merk = Merk::create($request->all());
        return redirect('admin/merk')->with('status','Merk Mobil berhasil ditambahkan');
    }
    public function update_data($id)
    {
        $merk = Merk::where('id',$id)->first();
        return view('admin/crud/update_merk',['merk' => $merk]);
    }
    public function update_data_aksi(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_merk' => 'required|unique:merk|max:100',
            ]);
        $merk = Merk::where('id',$id)->first();
        $merk->update($request->all());
        return redirect('admin/merk')->with('status','Merk Mobil berhasil diubah');
    }
    public function delete_data($id)
    {
        $merk = Merk::findOrFail($id);
        $merk->delete();

    return redirect('admin/merk')->with('delete','Merk Mobil berhasil Dihapus');
    }
}
