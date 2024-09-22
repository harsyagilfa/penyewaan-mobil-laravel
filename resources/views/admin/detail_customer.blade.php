@extends('admin.layouts.app')
@section('title','Detail Customer')
@section('content')
<div class="col-md-12">
    <div class="card-primary">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6"> 
                        <img src="{{ $customer->foto_profil ? asset('storage/customer/profil/' . $customer->foto_profil): asset('storage/customer/default_profile.jpg') }}" width="400px"  class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h4>Nama Customer:</h4>
                        <h6>{{ $customer->nama_customer ?? '..........' }}</h6>

                        <h4>Usia:</h4>
                        <h6>{{ $customer->usia ?? '..........' }}</h6>

                        <h4>No Telepon</h4>
                        <h6>{{ $customer->no_telepon ?? '..........' }}</h6>

                        <h4>Alamat: </h4>
                        <h6>{{ $customer->alamat ?? '..........'  }}</h6>

                        <h4>Pekerjaan:</h4>
                        <h6>{{ $customer->pekerjaan ?? '..........' }}</h6>

                        <h4>NIK:</h4>
                        <h6>{{ $customer->nik ?? '..........' }}</h6>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.data_customer') }}" class="btn btn-info">Kembali ke Daftar Mobil</a>
            </div>
        </div>
    </div>
</div>
@endsection
