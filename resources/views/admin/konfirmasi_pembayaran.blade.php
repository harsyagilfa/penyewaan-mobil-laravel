@extends('admin.layouts.app')
@section('title','Konfirmasi Pembayaran')
@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/konfirmasi_pembayaran.css') }}">
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.konfirmasi_pembayaran_aksi',$transaksi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Checkbox Konfirmasi Pembayaran -->
                <div class="form-group">
                    <label for="status_pembayaran">Konfirmasi Pembayaran</label>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="status_pembayaran" name="status_pembayaran" value="Lunas" required>
                      <label class="custom-control-label" for="status_pembayaran">Lunas</label>
                      <input type="hidden" value="{{ $transaksi->id }}" >
                    </div>
                  </div>
                <!-- Tombol Konfirmasi -->
                <button type="submit" class="btn btn-success">Konfirmasi</button>
            </form>
        </div>
    </div>
</div>
@endsection
