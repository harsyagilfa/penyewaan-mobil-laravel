@extends('admin.layouts.app')
@section('title','Pengembalian Mobil')
@section('content')
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
                    <input type="date" name="tanggal_pengembalian" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-info">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
