<a href="#" class="head">PT. RENTAL MAKMUR</a>
<nav class="navbar">
    <ul class="menu" id="menu-mobile">
      <li>
        <a class="{{ Request::is('customer/home') ? 'active' : '' }}" href="/customer/home" style="--i:1;">HOME</a>
      </li>
      <li>
        <a class="{{ Request::is('customer/layanan','customer/detail_mobil*','customer/sewa_mobil*')  ? 'active' : '' }}" href="/customer/layanan" style="--i:3;">MOBIL</a>
      </li>
      <li>
        <a class="{{ Request::is('customer/transaksi','customer/pembayaran*') ? 'active' : '' }}" href="/customer/transaksi" style="--i:4;">TRANSAKSI</a>
      </li>
      <li>
        <a class="{{ Request::is('customer/profil','customer/edit_profil') ? 'active' : '' }}" href="/customer/profil" style="--i:5;">{{ Auth::guard('customer')->user()->nama_customer }}</a>
      </li>
    </ul>
</nav>
<i class="bx bx-menu" id="menu-icon"></i>
