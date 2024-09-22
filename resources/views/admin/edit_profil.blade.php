@extends('admin.layouts.app')
@section('title','Edit Profil')
@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{ route('admin.edit_profil_aksi') }}" method="post" >
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label >Username Baru</label>
              <input type="text" name="username" class="form-control" id="username" value="{{ $admin->username }}" >
            </div>
            <div class="form-group">
              <label >Password Baru</label>
              <input type="password" name="password" class="form-control" id="password" value="" >
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Save</button>
          </div>

        </form>
      </div>
</div>
</div>
@endsection
