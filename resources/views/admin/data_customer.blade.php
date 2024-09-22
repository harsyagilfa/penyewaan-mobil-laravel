@extends('admin.layouts.app')
@section('title','Data customer')
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
        </div>
      <div class="card-body">
        <table id="" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th style="width: 10px" >No</th>
            <th>Nama Customer</th>
            <th>Usia</th>
            <th>No Telepon</th>
            <th style="width: 150px" >Action</th>
          </tr>
          </thead>
          <tbody>
            @forelse ( $customer_get as $c )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->nama_customer }}</td>
                <td>{{ $c->usia }}</td>
                <td>{{ $c->no_telepon }}</td>
                <td>
                    <a href="{{ route('admin.detail_customer',$c->id) }}" class="btn btn-sm btn-info" ><i class="fas fa-eye"></i></a>
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
