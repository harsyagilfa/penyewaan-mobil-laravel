@extends('customer.layouts.app')
@section('title','Detail Mobil')
@section('content')
<section class="detail" id="detail_mobil">
    <h2 class="detail-h2" id="detail-h2-mobile">Nama Mobil</h2>
    <div class="detail-img" id="detail-img-mobile">
        <img src="{{ asset('storage/' . $mobil->gambar) }}" alt="Gambar Mobil" />
    </div>
    <div class="detail-icons" id="detail-icons-mobile">
        <div class="icon-item">
            <i class="fas fa-car"></i>
            <span>{{ $mobil->plat }}</span>
        </div>
        <div class="icon-item">
            <i class="fas fa-calendar"></i>
            <span>{{ $mobil->tahun_pembuatan }}</span>
        </div>
        <div class="icon-item">
            <i class="fas fa-money-bill-wave-alt"></i>
            <span>Rp. {{ number_format($mobil->harga_sewa, 0, ',', '.') }}</span>
        </div>
        <div class="icon-item">
            <i class="fas fa-chair"></i>
            <span>{{ $mobil->kapasitas }}</span>
        </div>
    </div>
    <div class="detail-content" id="detail-content-mobile">
        <a href="{{ route('customer.layanan') }}" class="detail-btn">Kembali Ke Menu</a>
    </div>
</section>
@endsection
