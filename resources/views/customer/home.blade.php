@extends('customer.layouts.app')
@section('title', 'Home')
@section('content')
<!--hero design-->
<section class="hero" id="hero">
    <div class="hero-img" id="hero-img-mobile">
      <img src="{{ asset('storage/customer/home.png') }}" alt="" />
    </div>
    <div class="hero-content" id="hero-content-mobile">
      <span class="multiple-text" id="hero-h2"></span>
      <p id="hero-p">
        <span class="multiple-text2" id="span-p">PT. RENTAL MAKMUR</span>Adalah sebuah perusahaan yang secara khusus berfokus pada penyediaan jasa penyewaan mobil yang didirikan dengan visi dan misi untuk memenuhi berbagai kebutuhan transportasi masyarakat dari berbagai kalangan dan latar belakang. Melalui layanan yang inovatif dan berorientasi pada kepuasan pelanggan, perusahaan ini berupaya untuk menjangkau seluruh segmen masyarakat, mulai dari individu dengan kebutuhan transportasi sehari-hari, keluarga yang merencanakan liburan, hingga korporasi yang memerlukan armada kendaraan untuk keperluan operasional dan bisnis. Dengan demikian, perusahaan ini tidak hanya menawarkan solusi mobilitas yang fleksibel dan mudah diakses, tetapi juga berkomitmen untuk meningkatkan kualitas hidup masyarakat melalui layanan transportasi yang handal, aman, dan nyaman.
      </p>
    </div>
  </section>
  <!--hero design end-->
  <!--tentang design start -->
  <section class="tentang" id="tentang">
      <div class="tentang-content" id="tentang-content-mobile">
        <h2 class="tentang-h2" id="tentang-h2-mobile">TENTANG</h2>
        <p class="tentang-p" id="tentang-p-mobile">PT. Rental Makmur adalah perusahaan yang berfokus pada penyediaan jasa penyewaan mobil yang didirikan dengan tujuan untuk memenuhi kebutuhan transportasi masyarakat di berbagai kalangan. Dalam upaya memberikan layanan yang komprehensif, PT. Rental Makmur menyediakan berbagai jenis kendaraan yang dirancang untuk mengakomodasi beragam kebutuhan, baik itu untuk keperluan pribadi seperti liburan, perjalanan keluarga, maupun untuk keperluan bisnis seperti perjalanan dinas atau operasional perusahaan. Armada kendaraan yang dimiliki oleh PT. Rental Makmur sangat bervariasi, mulai dari mobil ekonomi yang efisien dan terjangkau, cocok untuk pelanggan yang mencari kenyamanan dengan anggaran terbatas, hingga mobil premium yang mewah dan berkelas, ideal untuk mereka yang menginginkan pengalaman berkendara yang lebih eksklusif. <br> Dengan komitmen yang kuat terhadap kualitas pelayanan, PT. Rental Makmur memastikan bahwa setiap kendaraan yang disewakan selalu dalam kondisi prima. Perusahaan secara rutin melakukan perawatan dan pengecekan menyeluruh pada setiap unit mobil, termasuk mesin, interior, dan eksterior, guna menjamin kenyamanan dan keamanan pelanggan selama berkendara. Selain itu, PT. Rental Makmur juga menerapkan standar kebersihan yang tinggi, memastikan bahwa mobil-mobil yang disewakan selalu bersih dan higienis, siap digunakan kapan saja. <br> </p>
      </div>
      <div class="tentang-img" id="tentang-img-mobile">
        <img src="{{ asset('storage/customer/tentang.jpg') }}" alt="" />
      </div>
  </section>
    <!--tentang design end-->
@endsection
