@extends('customer.layouts.app')
@section('title','Pembayaran')
@section('content')
<section class="payment-section">
    <div class="payment-container">
      <h2>Detail Pembayaran</h2>
      <!-- Informasi Transaksi -->
      <div class="transaction-info">
        <p><strong>Nomor Transaksi:</strong> INV{{ $transaksi->created_at->format('Ymd') }}</p>
        <p><strong>Tanggal Transaksi:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal_peminjaman)->format('d F Y') }}</p>
        <p><strong>Nama Customer:</strong> {{ $transaksi->customer->nama_customer }}</p>
        <p><strong>Nama Mobil:</strong> {{ $transaksi->mobil->nama_mobil }}</p>
        <p><strong>Total Harga :</strong> Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
      </div>

      <!-- Tombol Download Invoice -->
      <div class="download-invoice">
        <a href="{{ route('customer.invoice',$transaksi->id) }}" class="btn-download">Download Invoice</a>
        <a href="#" class="btn-upload" id="openPopupBtn">Upload Pembayaran</a>

      </div>

      <!-- Informasi Nomor Rekening -->
      <div class="rekening-info">
        <h3>Pilih Nomor Rekening Pembayaran:</h3>
        <div class="rekening-list">
          <div class="rekening-item">
            <p><strong>Bank BCA</strong></p>
            <p>Nomor Rekening: 123456789</p>
            <p>Atas Nama: PT Rental Makmur</p>
          </div>
          <div class="rekening-item">
            <p><strong>Bank Mandiri</strong></p>
            <p>Nomor Rekening: 987654321</p>
            <p>Atas Nama: PT Rental Makmur</p>
          </div>
          <div class="rekening-item">
            <p><strong>Bank BNI</strong></p>
            <p>Nomor Rekening: 456789123</p>
            <p>Atas Nama: PT Rental Makmur</p>
          </div>
        </div>
      </div>
    </div>
</section>
  <div id="uploadPopup" class="popup">
    <div class="popup-content">
      <span class="close-btn" id="closePopupBtn">&times;</span>
      <h2>Upload Bukti Pembayaran</h2>
      <form action="{{ route('customer.upload_pembayaran') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $transaksi->id }}"> <!-- Menyembunyikan ID Transaksi -->
        <label for="file" class="file-pembayaran">Pilih file pembayaran (jpg, png, pdf):</label>
        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept=".jpg,.jpeg,.png,.pdf" required>
        <input type="submit" class="btn-submit" value="Upload Bukti Pembayaran">
      </form>
    </div>
  </div>
@endsection
