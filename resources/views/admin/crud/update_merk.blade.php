@extends('admin.layouts.app')
@section('title','Update Merk Mobil')
@section('content')
<div class="col-md-7">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{ route('admin.update_merk_aksi',$merk->id) }}" method="post" >
            @csrf
            @method('put')
          <div class="card-body">
            <div class="form-group">
              <label >Nama Merk</label>
              <input type="text" name="nama_merk" class="form-control" id="nama_merk" value="{{ $merk->nama_merk }}" >
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Save</button>
          </div>

        </form>
      </div>
</div>
@endsection
