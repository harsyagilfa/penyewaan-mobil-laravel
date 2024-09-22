@extends('customer.layouts.app')
@section('title', 'Layanan Mobil')
@section('content')
<section class="layanan" id="layanan2-mobile">
    <div class="container">
        <h2>Daftar Mobil</h2>
        <div class="row">
            @foreach ( $mobil as $mbl )
            <div class="card">
                <img src="{{ asset('storage/' . $mbl->gambar) }}" alt="Card image cap" class="card-img">
                <div class="card-body">
                    <h5 class="card-title">{{ $mbl->nama_mobil }}</h5>
                    <p class="card-text">Rp. {{ number_format($mbl->harga_sewa, 0, ',', '.') }}</p>
                    <a href="{{ route('customer.detail_mobil',$mbl->id) }}" class="btn-detail">Detail</a>
                    @if($mbl->status == 'Tersedia')
                    <a href="{{ route('customer.sewa_mobil',$mbl->id) }}" class="btn-tersedia">Sewa</a>
                    @else
                    <a href="#" class="btn-kosong">Kosong</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
