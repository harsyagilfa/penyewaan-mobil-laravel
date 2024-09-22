@extends('customer.layouts.app')
@section('title','Transaksi')
@section('content')
@if(session('status'))
<div id="successModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-body">
            <div class="modal-header">
                <i class="far fa-check-circle"></i>
                <h2>Success!</h2>
            </div>
            <p>{{ session('status') }}</p>
        </div>
    </div>
</div>
@endif
<section class="transaksi-list">
    <div class="container">
        <h2 class="section-title">Riwayat Transaksi</h2>
        <div class="transaksi-cards">
            @forelse ($transaksi as $tr)
            <div class="transaksi-card">
                <div class="transaksi-header">
                    <h3>{{ $tr->mobil->nama_mobil }}</h3>
                </div>
                <div class="transaksi-body">
                    <p><strong>Merk Mobil   :</strong> {{ $tr->mobil->merk->nama_merk }}</p>
                    <p><strong>Tanggal Sewa :</strong> {{ \Carbon\Carbon::parse($tr->tanggal_peminjaman)->format('d F Y') }}</p>
                    <p><strong>Tanggal Kembali  :</strong> {{ \Carbon\Carbon::parse($tr->tanggal_kembali)->format('d F Y') }}</p>
                    <p><strong>Total Pembayaran :</strong> Rp. {{ number_format($tr->total_harga, 0, ',', '.') }}</p>
                </div>
                <div class="transaksi-footer">
                    @if (empty($tr->bukti_pembayaran))
                    <a href="{{ route('customer.pembayaran',$tr->id) }}" class="btn btn-payment">Bayar</a>
                    <a href="{{ route('customer.hapus_transaksi',$tr->id) }}" class="btn btn-cancel" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini')" >Batalkan</a>
                    @elseif($tr->status_pembayaran == 'Belum Lunas')
                    <a href="#" class="btn btn-waiting">Menunggu Konfirmasi</a>
                    @elseif ($tr->status_pembayaran == 'Lunas')
                    <a href="#" class="btn btn-success">Lunas</a>
                    @endif
                </div>
            </div>
            @empty
            <p class="kosong" style="text-align: center;">Transaksi Masih Kosong</p>
            @endforelse
        </div>
    </div>
</section>

@endsection
