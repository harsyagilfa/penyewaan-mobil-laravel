<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .header{
            text-align: center;
            font-size: 2rem;
        }
        .title{
            font-size: 1.5rem;
        }
        p{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2 class="header">PT. Makmur Jaya</h2>
    <div class="card-header">
        <h3 class="title" >Laporan Transaksi</h3>
    </div>
    <p>Bulan: {{ request('bulan') ? DateTime::createFromFormat('!m', request('bulan'))->format('F') : 'Semua' }}</p>
    <p>Tahun: {{ request('tahun') ? request('tahun') : 'Semua' }}</p>
</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>Nama Mobil</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Total Harga</th>
                <th>Denda</th>
              </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $tr )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tr->customer->nama_customer }}</td>
                <td>{{ $tr->mobil->nama_mobil }}</td>
                <td>{{ \Carbon\Carbon::parse($tr->tanggal_peminjaman)->format('d F Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($tr->tanggal_pengembalian)->format('d F Y') }}</td>
                <td>Rp. {{ number_format($tr->total_harga, 0, ',', '.') }}</td>
                <td>Rp. {{ number_format($tr->denda, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>
