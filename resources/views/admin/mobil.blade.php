@extends('admin.layouts.app')
@section('title','Data Mobil')
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
        <div class="card-header">
            <a href="{{ route('admin.tambah_mobil') }}" class="btn btn-info" ><i class="fas fa-plus"> Tambah Data </i></a>
        </div>
      <div class="card-body">
        <table id="" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th style="width: 10px" >No</th>
            <th>Nama Mobil</th>
            <th>Merk Mobil</th>
            <th>Harga Sewa</th>
            <th>Gambar</th>
            <th style="width: 150px" >Action</th>
          </tr>
          </thead>
          <tbody>
 @forelse ( $mobil as $mbl ) 

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $mbl->nama_mobil }}</td>
        <td>{{ $mbl->merk->nama_merk }}</td>
        <td>Rp. {{ number_format($mbl->harga_sewa, 0, ',', '.') }}</td>
        <td>
            @if($mbl->gambar)
                <img src="{{ asset('storage/' . $mbl->gambar) }}" width="100">
            @else
                <p>Tidak ada gambar</p>
            @endif
        </td>
        <td>

            <a href="{{ route('admin.detail_mobil',$mbl->id) }}" class="btn btn-sm btn-info" ><i class="fas fa-eye"></i></a>
            <a href="{{ route('admin.update_mobil',$mbl->id) }}" class="btn btn-sm btn-success" ><i class="fas fa-edit"></i></a>
            <a href="{{ route('admin.delete_mobil',$mbl->id) }}" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i></a>
            </td>
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
