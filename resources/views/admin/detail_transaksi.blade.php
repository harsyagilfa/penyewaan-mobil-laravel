@extends('admin.layouts.app')
@section('title','Detail Transaksi')
@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/detail_transaksi.css') }}">
<div class="col-md-12">
    <!-- Card Box for Transaction Detail -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Detail Transaksi</h3>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
              <dl class="row">
                  <dt class="col-sm-4">Nama Customer</dt>
                  <dd class="col-sm-8">{{ $transaksi->customer->nama_customer }}</dd>

                  <dt class="col-sm-4">Nama Mobil</dt>
                  <dd class="col-sm-8">{{ $transaksi->mobil->nama_mobil }}</dd>

                  <dt class="col-sm-4">Merk Mobil</dt>
                  <dd class="col-sm-8">{{ $transaksi->mobil->merk->nama_merk }}</dd>

                  <dt class="col-sm-4">Tanggal Peminjaman</dt>
                  <dd class="col-sm-8">{{ \Carbon\Carbon::parse($transaksi->tanggal_peminjaman)->format('d F Y') }}</dd>

                  <dt class="col-sm-4">Tanggal Kembali</dt>
                  <dd class="col-sm-8">{{ \Carbon\Carbon::parse($transaksi->tanggal_kembali)->format('d F Y') }}</dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-sm-4">Tanggal Pengembalian</dt>
                    @if(is_null($transaksi->tanggal_pengembalian))
                    <dd class="col-sm-8">Belum Dikembalikan</dd>
                    @else
                    <dd class="col-sm-8">{{ \Carbon\Carbon::parse($transaksi->tanggal_pengembalian)->format('d F Y') }}</dd>
                    @endif

                    <dt class="col-sm-4">Total Harga</dt>
                    <dd class="col-sm-8">Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</dd>

                    <dt class="col-sm-4">Denda</dt>
                    <dd class="col-sm-8">Rp {{ number_format($transaksi->denda, 0, ',', '.') }}</dd>
                    <dt class="col-sm-4">Status Pembayaran</dt>
                    @if ($transaksi->status_pembayaran == 'Belum Lunas')
                    <dd class="col-sm-8"><span class="badge badge-danger">Belum Lunas</span></dd>
                    @else
                    <dd class="col-sm-8"><span class="badge badge-success">Lunas</span></dd>
                    @endif
                </dl>
            </div>
        </div>
      </div>
      <!-- Card Footer -->
      <div class="card-footer">
        <div class="row">
          <div class="col-md-6">
            <h4>Bukti Pembayaran</h4>
            @if(is_null($transaksi->bukti_pembayaran))
            <a href="#" class="btn btn-danger mt-3">Bukti pembayaran belum diupload</a>
            @else
            <a href="{{ route('admin.download_bukti_pembayaran',$transaksi->id) }}" class="btn btn-info mt-3"><i class="fas fa-download" ></i> Downloar Bukti Pembayaran</a>
            @endif
          </div>
</div>
@endsection
