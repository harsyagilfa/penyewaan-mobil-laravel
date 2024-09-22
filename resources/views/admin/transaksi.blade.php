@extends('admin.layouts.app')
@section('title','Data Transaksi')
@section('content')
<div class="col-12">
    @if (session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
     @endif
    @if (session('delete'))
    <div class="alert alert-danger">
    {{ session('delete') }}
    </div>
     @endif
    <div class="card">
      <div class="card-body">
        <table id="" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th style="width: 10px" >No</th>
            <th>Nama Customer</th>
            <th>Nama Mobil</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th style="width: 200px" >Action</th>
          </tr>
          </thead>
          <tbody>
            @forelse ($transaksi as $tr)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $tr->customer->nama_customer }}</td>
        <td>{{ $tr->mobil->nama_mobil }}</td>
        <td>Rp. {{ number_format($tr->total_harga, 0, ',', '.') }}</td>
        <td>{{ $tr->status_pembayaran }}</td>
        @if(is_null($tr->bukti_pembayaran))
        <td>
            <a href="{{ route('admin.transaksi_detail',$tr->id) }}" class="btn btn-sm btn-info" ><i class="fas fa-eye"></i></a>
            <a href="#" class="btn btn-sm btn-danger" ><i class="fas fa-times-circle"></i></a>
            <a href="#" class="btn btn-sm btn-danger" ><i class="fas fa-times-circle"></i></a>
        </td>
        @elseif($tr->status_pembayaran == 'Belum Lunas' && $tr->status_pengembalian == "Belum Kembali")
        <td>
            <a href="{{ route('admin.transaksi_detail',$tr->id) }}" class="btn btn-sm btn-info" ><i class="fas fa-eye"></i></a>
            <a href="{{ route('admin.konfirmasi_pembayaran',$tr->id) }}" class="btn btn-sm btn-warning" ><i class="fas fa-wallet"></i></a>
            <a href="#" class="btn btn-sm btn-danger" ><i class="fas fa-times-circle"></i></a>
        </td>
        @elseif($tr->status_pembayaran =='Lunas' && $tr->status_pengembalian ==  "Belum Kembali")
        <td>
            <a href="{{ route('admin.transaksi_detail',$tr->id) }}" class="btn btn-sm btn-info" ><i class="fas fa-eye"></i></a>
            <a href="#" class="btn btn-sm btn-success" ><i class="fas fa-check-circle"></i></a>
            <a href="{{ route('admin.transaksi.pengembalian_mobil',$tr->id) }}" class="btn btn-sm btn-primary" ><i class="fas fa-car"></i></a>
        </td>
        @elseif($tr->status_pembayaran =="Lunas" && $tr->status_pengembalian == "Kembali")
        <td>
            <a href="{{ route('admin.transaksi_detail',$tr->id) }}" class="btn btn-sm btn-info" ><i class="fas fa-eye"></i></a>
            <a href="#" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></a>
            <a href="#" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></a>
        </td>
        @endif
        </tr>
        @empty
        <tr>
            <td colspan="8" style="text-align: center">Data masih kosong</td>
        </tr>
        @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
