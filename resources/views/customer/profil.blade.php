@extends('customer.layouts.app')
@section('title','Profil Customer')
@section('content')
@if(session('status'))
<div id="successModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-body">
            <div class="modal-header">
                <i class="far fa-check-circle"></i>
                <h2>Success!</h2>
            </div>
            <p>{{ session('status') }}</p>
        </div>
    </div>
</div>
@endif
<section class="customer-profile">
    <div class="profile-header">
      <div class="profile-picture">
        @if($customer->foto_profil)
        <img src="{{ asset('storage/customer/profil/' . $customer->foto_profil) }}" alt="Foto Profil">
        @else
        <img src="{{ asset('storage/customer/default_profile.jpg') }}" alt="Foto Profil">
        @endif
      </div>
      <div class="profile-info">
        <h1>{{ $customer->nama_customer }}</h1>
        <p><strong>Usia:</strong> {{ $customer->usia }} Tahun</p>
        <p><strong>Nomor Telepon:</strong> {{ $customer->no_telepon }}</p>
        <p><strong>Alamat:</strong> {{ $customer->alamat }}</p>
        <p><strong>Pekerjaan:</strong> {{ $customer->pekerjaan }}</p>
      </div>
    </div>
    <div class="profile-actions">
      <a href="{{ route('customer.edit_profil') }}" class="btn-edit"> <i class="fas fa-edit" ></i> Edit Profil</a>
      <a href="{{ route('customer.logout') }}" class="btn-change-password"><i class="fas fa-lock"></i> Logout </a>
    </div>
</section>

@endsection
