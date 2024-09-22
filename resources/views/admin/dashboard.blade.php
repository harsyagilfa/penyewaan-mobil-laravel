@extends('admin.layouts.app')
@section('title','Dashboard')
@section('content')
<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Data Customer</span>
        <span class="info-box-number">
          {{ $customer }}
        </span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-car"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Mobil</span>
        <span class="info-box-number">{{ $mobil }}</span>
      </div>
    </div>
  </div>
  <div class="clearfix hidden-md-up"></div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Transaksi</span>
        <span class="info-box-number">{{ $transaksi }}</span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Merk</span>
        <span class="info-box-number">{{ $merk }}</span>
      </div>
    </div>
  </div>
@endsection
