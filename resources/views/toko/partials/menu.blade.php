{{--  <li class="nav-item mT-30">
    <a class="sidebar-link" href="#">
        <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>  --}}
<li class="nav-item dropdown">
    <a class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder">
            <i class="c-orange-500 ti-layout-list-thumb"></i>
        </span>
        <span class="title">Produk</span>
        <span class="arrow">
            <i class="ti-angle-right"></i>
        </span>
    </a>
        <ul class="dropdown-menu">
            <li>
                  <a class='sidebar-link' href="{{ route('produk_index') }}">Produk Saya</a>
            </li>
            <li>
                  <a class='sidebar-link' href="{{ route('produk_create') }}">Tambah Produk</a>
            </li>
        </ul>
</li>
<li class="nav-item dropdown">
    <a class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder">
            <i class="c-red-500 ti-user"></i>
        </span>
        <span class="title">Toko</span>
        <span class="arrow">
            <i class="ti-angle-right"></i>
        </span>
    </a>
        <ul class="dropdown-menu">
            <li>
                  <a class='sidebar-link' href="{{route('toko_profil_index')}}">Profil Toko</a>
            </li>
        </ul>
</li>
<li class="nav-item">
    <a class='sidebar-link' href="{{route('chart')}}">
        <span class="icon-holder">
            <i class="c-light-blue-500 ti-money"></i>
        </span>
        <span class="title">Laporan</span>
    </a>
</li>
<li class="nav-item dropdown">
    <a class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder">
            <i class="c-red-500 ti-user"></i>
        </span>
        <span class="title">Penjualan</span>
        <span class="arrow">
            <i class="ti-angle-right"></i>
        </span>
    </a>
        <ul class="dropdown-menu">
            <li>
                  <a class='sidebar-link' href="{{route('show_penjualan_semua')}}">Semua</a>
            </li>
            <li>
                  <a class='sidebar-link' href="{{route('show_penjualan_dibayar')}}">Perlu Konfirmasi</a>
            </li>
          <li>
            <a class='sidebar-link' href="{{route('show_penjualan_diproses')}}">Perlu Dikirim</a>
            </li>
            <li>
                <a class='sidebar-link' href="{{route('show_penjualan_dikirim')}}">Dalam Pengiriman</a>
             </li>
             <li>
                <a class='sidebar-link' href="{{route('show_penjualan_selesai')}}">Selesai</a>
             </li>
             <li>
                <a class='sidebar-link' href="{{route('show_penjualan_transfer')}}">Transfer Admin</a>
             </li>
             {{--  <li>
                <a class='sidebar-link' href="{{route('show_penjualan_batal')}}">Respon Pembatalan</a>
             </li>  --}}
        </ul>
</li>

<li class="nav-item">
    <a class='sidebar-link' href="{{route('prediksi_harga')}}">
        <span class="icon-holder">
            <i class="c-light-blue-500 ti-money"></i>
        </span>
        <span class="title">Prediksi Harga</span>
    </a>
</li>