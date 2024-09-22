@extends('customer.layouts.app')
@section('title','Edit Profil')
@section('content')
<section class="form-section" id="form-edit-profil">
    <div class="form-edit-profil-container">
        <h2 class="form-title">Edit Profil</h2>
        <form action="{{ route('customer.edit_profil_aksi') }}" method="POST" class="form-edit-profil" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama" class="nama">Nama Lengkap</label>
                <input type="text" id="nama_customer" name="nama_customer" value="{{ $customer->nama_customer }}">
            </div>
            <div class="form-group">
                <label for="nama">Usia</label>
                <input type="number" id="usia" name="usia" value="{{ $customer->usia }}">
            </div>
            <div class="form-group">
                <label for="tanggal">NIK</label>
                <input type="number" id="nik" name="nik" value="{{ $customer->nik }}">
            </div>
            <div class="form-group">
                <label for="nama">No Telepon</label>
                <input type="number" id="no_telepon" value="{{ $customer->no_telepon }}" name="no_telepon" >
            </div>
            <div class="form-group">
                <label for="no_telp">Alamat</label>
                <textarea name="alamat" id="alamat" cols="70" rows="5" >{{ $customer->alamat }}</textarea>
            </div>
            <div class="form-group">
                <label for="tanggal">Pekerjaan</label>
                <input type="text" id="pekerjaan" value="{{ $customer->pekerjaan }}" name="pekerjaan" >
            </div>
            <div class="form-group">
                <label for="tanggal">Foto Profil</label>
                <input type="file" id="foto_profil" name="foto_profil" >
            </div>
            <div class="form-group">
                <label for="tanggal">Foto SIM</label>
                <input type="file" id="foto_sim" name="foto_sim">
            </div>
            <button type="submit" class="submit-btn">Update</button>
        </form>
    </div>
</section>
@endsection
