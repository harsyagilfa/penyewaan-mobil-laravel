<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- css-->
    <link rel="stylesheet" href="{{ asset('customer/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/layanan.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/detail_mobil.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/sewa_mobil.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/transaksi.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/pembayaran.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/profil.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/edit_profil.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/responsive/navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/responsive/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/responsive/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/css/session.css') }}">
    <!--box icon-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
    <!--header design-->
    <header class="header">
       @include('customer.layouts.header')
    </header>
    <!--navbar mobile -->
<!--header design end-->
@include('customer.layouts.main_layouts')
<!--footer-->
<footer class="footer">
    @include('customer.layouts.footer')
</footer>
 <!--script utama-->
 <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
 <script src="https://unpkg.com/scrollreveal"></script>
 <script src="{{ asset('customer/js/script.js') }}"></script>
 <script src="{{ asset('customer/js/navbar.js') }}"></script>
 <script src="{{ asset('customer/js/home.js') }}"></script>
 <script src="{{ asset('customer/js/pembayaran.js') }}"></script>
 <script src="{{ asset('customer/js/session.js') }}" ></script>
</body>
</html>
