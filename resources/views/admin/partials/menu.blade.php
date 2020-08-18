{{--<li class="nav-item mT-30">
    <a class="sidebar-link" href="{{route('show_transaksi_menunggu_konfirmasi')}}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>--}}
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
        {{--<li>
                  <a class='sidebar-link' href="{{ route('products_index') }}">Kategori Produk</a>
            </li>--}}
            <li>
                  <a class='sidebar-link' href="{{ route('jenis_produk') }}">Jenis Produk</a>
            </li>
            <li>
                  <a class='sidebar-link' href="{{route('products_admin')}}">Produk Dijual</a>
            </li>
        </ul>
</li>
<li class="nav-item dropdown">
    <a class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder">
            <i class="c-red-500 ti-user"></i>
        </span>
        <span class="title">Users</span>
        <span class="arrow">
            <i class="ti-angle-right"></i>
        </span>
    </a>
        <ul class="dropdown-menu">
            <li>
                  <a class='sidebar-link' href="{{route('get_user')}}">Semua Users</a>
            </li>
            <li>
                  <a class='sidebar-link' href="{{route('get_toko')}}">Toko</a>
            </li>
        </ul>
</li>
<li class="nav-item dropdown">
    <a  class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder">
            <i class="c-teal-500 ti-money"></i>
        </span>
        <span class="title">Transaksi</span>
        <span class="arrow">
            <i class="ti-angle-right"></i>
        </span>
    </a>
    <ul class="dropdown-menu">
        <li>
              <a class='sidebar-link' href="{{route('show_transaksi_menunggu_konfirmasi')}}">Menunggu Konfirmasi</a>
        </li>
        <li>
              <a class='sidebar-link' href="{{route('show_transaksi_proses')}}">Sedang Diproses</a>
        </li>
        <li>
            <a class='sidebar-link' href="{{route('show_transaksi_selesai')}}">Selesai</a>
      </li>
    </ul>
</li>

<li class="nav-item">
    <a class='sidebar-link' href="{{route('show_barcode_admin')}}">
        <span class="icon-holder">
            <i class="c-light-blue-500 ti-upload"></i>
        </span>
        <span class="title">Upload Barcode</span>
    </a>
</li>
<li class="nav-item dropdown">
    <a  class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder">
            <i class="c-deep-orange-500 ti-calendar"></i>
        </span>
        <span class="title">Prediksi Harga</span>
        <span class="arrow">
            <i class="ti-angle-right"></i>
        </span>
    </a>
    <ul class="dropdown-menu">
        <li>
              <a class='sidebar-link' href="{{route('prediksi.index')}}">Prediksi Harga Produk</a>
        </li>
        <li>
              <a class='sidebar-link' href="{{route('histori.harga')}}">Tabel Histori Harga</a>
        </li>
    </ul>
</li>
<!-- <li class="nav-item">
    <a class='sidebar-link' href="{{route('prediksi.index')}}">
        <span class="icon-holder">
            <i class="c-light-blue-500 ti-money"></i>
        </span>
        <span class="title">Prediksi Harga</span>
    </a>
</li> -->
<li class="nav-item">
    <a class='sidebar-link' href="{{route('pembayaran_all')}}">
        <span class="icon-holder">
            <i class="c-deep-purple-500 ti-share"></i>
        </span>
        <span class="title">Transfer ke Penjual</span>
    </a>
</li>

