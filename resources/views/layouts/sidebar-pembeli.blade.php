<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MALL IKAN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https:////netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    

    <link rel="stylesheet" href="{{url('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/animate.css')}}">
    
    <link rel="stylesheet" href="{{url('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{url('css/aos.css')}}">

    <link rel="stylesheet" href="{{url('css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{url('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{url('css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{url('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link rel="stylesheet" href="{{url('css2/style.css')}}">
    <link rel="stylesheet" href="{{url('css2/style-profile.css')}}">
    <style>
     
.sidebar {
  color: #FFF;
  background: #2b2b2d;
  width: 250px;
  max-width: 250px;
  height: 100vh;
    float: left;
  /* position: fixed; */
  z-index: 1000;
  display: block;
  -webkit-transition: margin 2s;
  transition: margin 2s;
flex:1;
}
#navbar-toggle {
  cursor: pointer;
}
#toggleView {
  margin-left: 44px;
}
.menu-icon {
  float: right;
}
.sidebar-nav {
  display: block;
  float: left;
  width: 100%;
  list-style: none;
  margin: 0;
  padding: 0;
}
.sidebar-nav li a {
  padding-left: 20px;
  font-size: 16px;
  text-decoration: none;
  color: #FFF;
  float: left;
  text-decoration: none;
  width: 100%;
  height: 70px;
  line-height: 25px;
  padding: 20px;
  vertical-align: center;
}

.sidebar-nav li a:hover {
  background:#007ea8;
  -webkit-transition: background 0.5s;
  transition: background 0.5s;
}

  .dropdown-btn {
  padding: 20px;
  text-decoration: none;
  font-size: 16px;
  color: #fff;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

 .dropdown-btn:hover {
  color: #fff;
  background-color: #007ea8;
}

.active {
  background-color: #007ea8;
  color: white;
}

.dropdown-container {
  display: none;
  background-color: #fff;
  padding-left: 8px;
}

.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* css order */
i.material-icons {
  font-size: inherit;
}

.billing-details {
  padding: 20px;
  margin-top: 30px;
}

.billing-details-content {
  background: #ddf4f6;
  padding: 30px;
  border-radius: 20px 0px 20px 20px;

}

.bil-title {
  font-weight: 600;
  font-size: 18px;
  color: #0e8e92;
  letter-spacing: 1px;
  margin-bottom: 20px;
}

.billing-details-content table {
  width: 100%;
  color: #0e8e92;
      border-collapse: collapse;
}

table tr td {
  padding: 2px;
  letter-spacing: 1px;
}

table tr td i {
  width: 18px;
  vertical-align: middle;
}

td.right-t {
  text-align: right;
  font-weight: 600;
  letter-spacing: 1px;
}
tr.br-top td {
  border-top: 1px solid #01ac8f;
  padding: 5px 0px 0px;
}
tr.br-top td.right-t {
  font-size: 16px;
}

.anyClass {
  height:560px;
  overflow-y: scroll;
}
</style>

  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
        <a href="{{route('portal')}}"><img src="/assets/logo-putih.png" alt="" width=80 height=35></a>
        
        <div class="search input-group md-form form-sm form-1 pl-0" style="margin-left: 20px; width: 500px">
          <input class="my-0 py-1" type="text" placeholder="Search" aria-label="Search"
            style="padding:15px; border-radius: 5px; border: 3px solid #fff; border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem; height: 50px; width: 400px">
          <div class="container justify-content-center"style="border-radius: 5px; color:#007ea8; border: 3px solid #fff; margin-left: -5px; width: 50px; height: 50px">
            <i class="fa icon-search center" aria-hidden="true" style="color: white; margin-top: 15px"></i>
          </div>
        </div>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <!-- Authentication Jualan -->
            @guest
            @else
              @if (Auth::user()->boolean_penjual == 'true')
                <a href="{{route('toko_profil_index')}}" class="nav-link text-white">Mulai Berjualan</a>
              @else
                <a href="{{route('toko_create_index')}}" class="nav-link text-white">Buka Toko</a>
              @endif
              </li>
            <li class="nav-item"><div class="garis align-self-center" style="margin-top: 15px; height: 30px; position: absolute; border-left: 1px solid white"></div>
        </li>
            <li class="nav-item cta cta-colored"><a href="{{route('cart_index')}}" class="nav-link"><span class="icon-shopping_cart"></span>[]</a></li>
            <li class="nav-item cta cta-colored"><a href="#" class="nav-link"><i class="icon-bell"></i>[0]</a></li>

            @endguest
            
            <!-- Authentication Links -->
            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
              </li>
                @if (Route::has('register'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                  </li>
                @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                      </form>
                </div>
              </li>
            @endguest
	        </ul>
	      </div>
      </div>
    </nav>

    <div class="sidebar" >

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
            <button class="dropdown-btn" id="navbar-toggle">Produk<i class="fa fa-caret-down" style="padding-left:5px; padding-right: 2px"></i>
              <i class="fa fa-product-hunt menu-icon fa-2x" aria-hidden="true"></i>
            </button>
            <div class="dropdown-container">
              <a class="sidebar-link" href="{{ route('jenis_produk') }}">Jenis Produk</a>
              <a class="sidebar-link" href="#">Produk Dijual</a>
            </div>
          </li>
          <li>
            <button class="dropdown-btn" id="navbar-toggle">Pesanan Saya
              <i class="fa fa-caret-down" style="padding-left:5px; padding-right: 2px;" aria-hidden="true"></i>
              <i class="fa fa-list menu-icon fa-2x" aria-hidden="true"></i> 
            </button>
            <div class="dropdown-container">
              {{--<a class="sidebar-link" href="{{route('show_pesanan_semua')}}">Semua Pesanan</a>--}}
              {{--<a class="sidebar-link" href="{{route('show_pesanan_belum_bayar')}}">Belum Bayar</a>--}}
              <a class="sidebar-link" href="{{route('show_pesanan_dikemas')}}">Sedang Diproses</a>
              <a class="sidebar-link" href="{{route('show_pesanan_dikirim')}}">Dikirim</a>
              <a class="sidebar-link" href="{{route('show_pesanan_selesai')}}">Selesai</a>
              <a class="sidebar-link" href="{{route('show_pesanan_batal')}}">Dibatalkan</a>
            </div>
          </li>

      </ul>
    </div>

    @yield('content')
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <!-- jQuery -->
  <script src="{{ url('vendors/jquery/dist/jquery.min.js') }}"></script>

  <!-- <script src="js/jquery.min.js"></script> -->
  <script src="{{url('js/jquery.min.js') }}"></script>
  <script src="{{url('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{url('js/popper.min.js')}}"></script>
  <script src="{{url('js/bootstrap.min.js')}}"></script>
  <script src="{{url('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{url('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{url('js/jquery.stellar.min.js')}}"></script>
  <script src="{{url('js/owl.carousel.min.js')}}"></script>
  <script src="{{url('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{url('js/aos.js')}}"></script>
  <script src="{{url('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{url('js/bootstrap-datepicker.js')}}"></script>
  <script src="{{url('js/scrollax.min.js')}}"></script>
  <script src="{{url('js/main.js')}}"></script>

  <script src="{{url('js/sidenav.js')}}"></script>
  
  <script src="{{ url('/js/app.js') }}"></script>
  <script src="{{ url('js/jquery-3.2.1.min.js') }}"></script>

    @yield('js')
    @stack('scripts')
    <script>
      /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
      var dropdown = document.getElementsByClassName("dropdown-btn");
      var i;
      
      for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
        } else {
        dropdownContent.style.display = "block";
        }
        });
      }

      $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
    </script>
    
  </body>
</html>