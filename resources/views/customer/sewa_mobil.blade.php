@extends('customer.layouts.app')
@section('title','Sewa Mobil')
@section('content')
<section class="form-section" id="form-pemesanan">
    <div class="form-pemesanan-container">
        <h2 class="form-title">Form Penyewaan Mobil</h2>
        <form action="{{ route('customer.sewa_mobil_aksi') }}" method="POST" class="form-pemesanan">
            @csrf
            <div class="form-group">
                <label for="nama" class="nama">Nama Customer</label>
                <input type="hidden" name="mobil_id" value="{{ $mobil->id }}">
                <input type="text" id="nama_customer" name="nama_customer" value="{{ $customer->nama_customer }}" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama Mobil</label>
                <input type="text" id="nama_mobil" name="nama_mobil" value="{{ $mobil->nama_mobil }}"  readonly>
            </div>
            <div class="form-group">
                <label for="nama">No Telepon</label>
                <input type="text" id="no_telepon" value="{{ $customer->no_telepon }}" name="no_telepon" readonly>
            </div>
            <div class="form-group">
                <label for="no_telp">Harga Sewa</label>
                <input type="number" id="harga_sewa"  name="harga_sewa" value="{{ number_format($mobil->harga_sewa, 0, ',', '.') }}"  required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Peminjaman</label>
                <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Kembali</label>
                <input type="date" id="tanggal_kembali" name="tanggal_kembali" required>
            </div>
            <button type="submit" class="submit-btn">Pesan Sekarang</button>
        </form>
    </div>
</section>
@endsection
