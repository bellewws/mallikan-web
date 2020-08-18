<div class="sidebar">
      <ul class="sidebar-nav anyClass">
          <li>
              <a id="navbar-toggle">Tutup <i class="fa fa-bars menu-icon fa-2x" aria-hidden="true"></i></a>
          </li>
          <li>
            <a> {{Auth::user()->name}}<i class="fa fa-user-circle menu-icon fa-2x" aria-hidden="true"></i> </a>
          </li>
          <li>
              <a href="{{route('show_profile')}}">Ubah Profil <i class="fa fa-pencil menu-icon fa-2x" aria-hidden="true"></i> </a>
          </li>
          <li>
            <button class="dropdown-btn" id="navbar-toggle">Pesanan Saya
              <i class="fa fa-caret-down" style="padding-left:5px; padding-right: 2px;" aria-hidden="true"></i>
              <i class="fa fa-list menu-icon fa-2x" aria-hidden="true"></i> 
            </button>
            <div class="dropdown-container">
              <a class="sidebar-link" href="{{route('show_pesanan_semua')}}">Semua Pesanan</a>
              {{--  <a class="sidebar-link" href="{{route('show_pesanan_belum_bayar')}}">Belum Bayar</a>  --}}
              <a class="sidebar-link" href="{{route('show_pesanan_dikemas')}}">Sedang Diproses</a>
              <a class="sidebar-link" href="{{route('show_pesanan_dikirim')}}">Dikirim</a>
              <a class="sidebar-link" href="{{route('show_pesanan_selesai')}}">Selesai</a>
              <a class="sidebar-link" href="{{route('show_pesanan_batal')}}">Pembayaran Batal</a>
            </div>
          </li>

      </ul>
    </div>
