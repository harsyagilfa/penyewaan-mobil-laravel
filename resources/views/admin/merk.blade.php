@extends('admin.layouts.app')
@section('title','Daftar Merk Mobil')
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
            <a href="{{ route('admin.tambah_merk') }}" class="btn btn-info" ><i class="fas fa-plus"> Tambah Data </i></a>
        </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th style="width: 10px" >No</th>
            <th>Nama Merk</th>
            <th style="width: 150px" >Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ( $merk_get as $m )

            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $m->nama_merk }}</td>
              <td><a href="{{ route('admin.update_merk',$m->id) }}" class="btn btn-sm btn-success" ><i class="fas fa-edit"></i></a>
                  <a href="{{ route('admin.delete_merk',$m->id) }}" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i></a></td>
          </tr>
            @endforeach
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection
