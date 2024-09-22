<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('customer/css/invoice.css') }}">
    <title>Invoice</title>
</head>
<body>
    <section class="invoice-section">
        <div class="invoice-container">
          <h2>Invoice Pembayaran</h2>
          <div class="invoice-header">
            <div class="invoice-info">
              <p><strong>Nomor Invoice:</strong> INV{{ $transaksi->created_at->format('Ymd') }}</p>
              <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal_peminjaman)->format('d F Y') }}</p>
              <p><strong>Nama Customer:</strong> {{ $transaksi->customer->nama_customer }}</p>
            </div>
            <div class="company-info">
              <p><strong>PT. RENTAL MAKMUR</strong></p>
              <p>Jalan Ahmad Thahar, RT.002, RW.010</p>
              <p>Pematang Reba, Riau</p>
            </div>
          </div>

          <div class="invoice-table">
            <table>
              <thead>
                <tr>
                  <th>Nama Mobil</th>
                  <th>Tanggal Peminjaman</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Total Harga</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $transaksi->mobil->nama_mobil }}</td>
                  <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_peminjaman)->format('d F Y') }}</td>
                  <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_kembali)->format('d F Y') }}</td>
                  <td>Rp. {{ number_format($transaksi->mobil->harga_sewa, 0, ',', '.') }}</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="invoice-footer">
            <p><strong>Total Bayar:</strong> Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
            <p><strong>Metode Pembayaran:</strong> Transfer Bank</p>
          </div>

          <div class="thank-you-note">
            <p>Terima kasih atas pembayaran Anda! Kami berharap Anda menikmati layanan kami.</p>
          </div>
        </div>
    </section>
    <script type="text/javascript" >
        window.print();
  </script>
</body>
</html>

