@extends('admin.layouts.app')
@section('title','Laporan Transaksi')
@section('content')
<style>
    .card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header div {
    display: flex;
    flex-direction: column;
}

.card-header p {
    margin: 0;
    padding: 0;
}

.btn {
    margin-left: 20px; /* Atur sesuai kebutuhan */
    width: 30%;
}
</style>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3  class="card-title">Filter Laporan</h3>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-md-4">
                        <label for="bulan">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control" required>
                            <option value="">Pilih Bulan</option>
                            @for($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control" required>
                            <option value="">Pilih Tahun</option>
                            @for($i = 2020; $i <= date('Y'); $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="mobil">Mobil</label>
                        <select name="mobil_id" id="nama_mobil" class="form-control">
                            <option value="">Pilih Mobil</option>
                            @foreach ($mobil as $m)
                                <option value="{{ $m->id }}">{{ $m->nama_mobil }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 align-self-end mt-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="javascript:void(0)" class="btn btn-danger" onclick="resetFilter()">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(request('bulan') && request('tahun') && ('mobil'))
    <div class="card">
        <div class="card-header" style="font-weight: bold">
            <p  >Bulan: {{ request('bulan') ? DateTime::createFromFormat('!m', request('bulan'))->format('F') : 'Semua' }}</p>
            <p> Tahun: {{ request('tahun') ? request('tahun') : 'Semua' }}</p>
            <p> Mobil: @if(request('mobil_id'))
                @php
                    // Ambil nama mobil berdasarkan mobil_id dari koleksi mobil yang ada
                    $mobilTerpilih = $mobil->where('id', request('mobil_id'))->first();
                @endphp
                {{ $mobilTerpilih ? $mobilTerpilih->nama_mobil : 'Mobil Tidak Ditemukan' }}
            @else
                Semua
            @endif
        </p>
        @if($transaksi->isNotEmpty())
            <a href="{{ route('admin.laporan_transaksi.print_laporan', ['bulan' => request('bulan'), 'tahun' => request('tahun'),'mobil'=> request('mobil_id')]) }}" target="_blank" class="btn btn-success"> <i class="fas fa-print" ></i> Print Laporan</a>
            @else
            <button class="btn btn-danger" disabled ><i class="fas fa-exclamation-triangle"></i> Transaksi Tidak Ditemukan</button>
            @endif
    </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" >
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
                    @forelse ( $transaksi as $tr )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tr->customer->nama_customer }}</td>
                        <td>{{ $tr->mobil->nama_mobil }}</td>
                        <td>{{ \Carbon\Carbon::parse($tr->tanggal_peminjaman)->format('d F Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($tr->tanggal_pengembalian)->format('d F Y') }}</td>
                        <td>Rp. {{ number_format($tr->total_harga, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($tr->denda, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center" style="font-weight: bold">Transaksi Tidak Ditemukan</td>
                    </tr>
                    @endforelse
                  </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
<script>
    function resetFilter() {
        document.querySelector('select[name="bulan"]').value = '';
        document.querySelector('select[name="tahun"]').value = '';
        document.querySelector('select[name="mobil"]').value = '';
        document.forms[0].submit();
    }
</script>
@endsection
