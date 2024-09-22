@extends('admin.layouts.app')
@section('title','Tambah Data Mobil')
@section('content')
<div class="col-md-12">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{ route('admin.tambah_mobil_aksi') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <!-- Kolom pertama -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Mobil</label>
                            <input type="text" name="nama_mobil" class="form-control" id="nama_mobil">
                        </div>
                        <div class="form-group">
                            <label>Merk Mobil</label>
                            <select class="form-control" name="merk_id" id="merk_id">
                                <option value="#">Select Merk Mobil</option>
                                @foreach ($merk as $m)
                                <option value="{{ $m->id }}">{{ $m->nama_merk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Plat Mobil</label>
                            <input type="text" name="plat" class="form-control" id="plat">
                        </div>
                        <div class="form-group">
                            <label>Tahun Pembuatan</label>
                            <input type="number" name="tahun_pembuatan" class="form-control" id="tahun_pembuatan">
                        </div>
                    </div>
                    <!-- Kolom kedua -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" name="warna" class="form-control" id="warna">
                        </div>
                        <div class="form-group">
                            <label>Kapasitas</label>
                            <input type="number" name="kapasitas" class="form-control" id="kapasitas">
                        </div>
                        <div class="form-group">
                            <label>Harga Sewa</label>
                            <input type="number" name="harga_sewa" class="form-control" id="harga_sewa">
                        </div>
                        {{-- <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="#">Pilih Status</option>
                                <option value="tersedia">Tersedia</option>
                                <option value="kosong">Kosong</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="form-control" id="gambar">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
