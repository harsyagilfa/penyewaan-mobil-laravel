@extends('admin.layouts.app')
@section('title','Detail Mobil')
@section('content')
<div class="col-md-12">
    <div class="card-primary">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/' . $mobil->gambar) }}"  class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h4>Nama Mobil:</h4>
                        <h6>{{ $mobil->nama_mobil }}</h6>

                        <h4>Merk:</h4>
                        <h6>{{ $mobil->merk->nama_merk }}</h6>

                        <h4>Plat Mobil</h4>
                        <h6>{{ $mobil->plat }}</h6>

                        <h4>Warna:</h4>
                        <h6>{{ $mobil->warna }}</h6>

                        <h4>Tahun:</h4>
                        <h6>{{ $mobil->tahun_pembuatan }}</h6>
                        <h4>Status:</h4>
                        <h6>{{ $mobil->status }}</h6>

                        <h4>Harga Sewa:</h4>
                        <h6>Rp. {{ number_format($mobil->harga_sewa, 0, ',', '.') }}</h6>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.mobil') }}" class="btn btn-info">Kembali ke Daftar Mobil</a>
            </div>
        </div>
    </div>
</div>

@endsection
