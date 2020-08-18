<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MALL IKAN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/assets/logo-biru.png" type="image/png" sizes="16x16">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">

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
    <link rel="stylesheet" href="{{url('css/style-order-detail.css')}}">
    <style>
      /* width */
      ::-webkit-scrollbar {
          width: 7px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
          background: #f1f1f1;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
          background: #a7a7a7;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
          background: #929292;
      }

      ul {
          margin: 0;
          padding: 0;
      }

      li {
          list-style: none;
      }

      .user-wrapper, .message-wrapper {
          border: 1px solid #dddddd;
          overflow-y: auto;
      }

      .user-wrapper {
          height: 600px;
      }

      .user {
          cursor: pointer;
          padding: 5px 0;
          position: relative;
      }

      .user:hover {
          background: #eeeeee;
      }

      .user:last-child {
          margin-bottom: 0;
      }

      .pending {
          position: absolute;
          left: 13px;
          top: 9px;
          background: #b600ff;
          margin: 0;
          border-radius: 50%;
          width: 18px;
          height: 18px;
          line-height: 18px;
          padding-left: 5px;
          color: #ffffff;
          font-size: 12px;
      }

      .media-left {
          margin: 0 10px;
      }

      .media-left img {
          width: 64px;
          border-radius: 64px;
      }

      .media-body p {
          margin: 6px 0;
      }

      .message-wrapper {
          padding: 10px;
          height: 536px;
          background: #eeeeee;
      }

      .messages .message {
          margin-bottom: 15px;
      }

      .messages .message:last-child {
          margin-bottom: 0;
      }

      .received, .sent {
          width: 45%;
          padding: 3px 10px;
          border-radius: 10px;
      }

      .received {
          background: #ffffff;
      }

      .sent {
          background: #3bebff;
          float: right;
          text-align: right;
      }

      .message p {
          margin: 5px 0;
      }

      .date {
          color: #777777;
          font-size: 12px;
      }

      .active {
          background: #eeeeee;
      }

      input[type=text] {
          width: 100%;
          padding: 12px 20px;
          margin: 15px 0 0 0;
          display: inline-block;
          border-radius: 4px;
          box-sizing: border-box;
          outline: none;
          border: 1px solid #cccccc;
      }

      input[type=text]:focus {
          border: 1px solid #aaaaaa;
      }

      .count{
        display: inline-block;
        list-style-type: none;
        padding: 1em;
        text-transform: uppercase;
      }
      
      .count span {
        display: block;
        font-size: 1rem;
      }
      
      
      .container-count {
        color: #333;
        margin: 0 auto;
        padding: 0.5rem;
        text-align: center;
      }
  </style>

  </head>
  <body class="goto-here">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
      <a href="{{route('portal')}}"><img src="/assets/logo-putih.png" alt="" width=80 height=35></a>
        <!-- search -->
        <form action="{{route('search')}}" method="GET">	      
        <div class="search input-group md-form form-sm form-1 pl-0" style="margin-left: 20px; width: 500px">
          <input class="my-0 py-1" type="text" id="cari" name="cari" placeholder="Cari Produk" value="{{ old('cari') }}" aria-label="Search" style="padding:15px; border-radius: 5px; border: 3px solid #fff; border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem; height: 50px; width: 400px" >
          <div class="container justify-content-center"style="border-radius: 5px; color:#007ea8; border: 3px solid #fff; margin-left: -5px; width: 50px; height: 50px">
          <button id="searchBtn" class="btn" type="submit"><i class="fa icon-search center" aria-hidden="true" style="color: white; margin-left: -10px; margin-top: 8px"></i></button>
          </div>
        </div>
        </form>
        <!-- end search -->
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          {{--<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.html">Shop</a>
              	<a class="dropdown-item" href="wishlist.html">Wishlist</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="cart.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li>--}}
            <li class="nav-item">
            <!-- Authentication Jualan -->
            @guest
            @else
              @if (Auth::user()->boolean_penjual == 'true')
                <a href="{{route('show_penjualan_dibayar')}}" class="nav-link text-white"><strong>Halaman Toko</strong></a>
              @else
                <a href="{{route('toko_create_index')}}" class="nav-link text-white">Buka Toko</a>
              @endif
              </li>
            <li class="nav-item"><div class="garis align-self-center" style="margin-top: 15px; height: 30px; position: absolute; border-left: 1px solid white"></div>
            </li>
            <li class="nav-item cta cta-colored">
              <a href="{{route('cart_index')}}" class="nav-link">
                <span class="icon-shopping_cart"></span>
                [{{\DB::table('transaksis')->where([ ['id_user', '=', Auth::id()],['id_status','=','1'] ])->count()}}]
                {{--  {{$count->count()}}  --}}
              </a>
            </li>
            <li class="nav-item cta cta-colored">
              <a href="{{route('user_notif')}}" class="nav-link">
                <i class="icon-bell"></i>[ {{$notif->count()}} ]
              </a>
            </li>
            <li class="nav-item cta cta-colored">
              <a href="{{route('chat')}}" class="nav-link">
              <i class="icon-chat"></i>
              {{--  [{{\DB::table('messages')->where([ ['from','=',Auth::id()],['is_read', '=', '0'] ])->count()}}]  --}}
              [ {{\DB::table('messages')->where('is_read', '=', '0')->count()}}]
              </a>
            </li>
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
                  <a class="dropdown-item" href="{{route('show_profile')}}">Akun Saya</a>
                  <a class="dropdown-item" href="{{route('show_pesanan_semua')}}">Pesanan Saya</a>
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
      
@yield('content')

  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <!-- jQuery -->
  <script src="{{ url('vendors/jquery/dist/jquery.min.js') }}"></script>

  <!-- <script src="js/jquery.min.js"></script> -->

  <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

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
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
  <!-- <script src="js/google-map.js"></script> -->
  <script src="{{url('js/main.js')}}"></script>

  <script src="{{ url('/js/app.js') }}"></script>
  <script src="{{ url('js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ url('js/countdown.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
  <script src="{{url('js/sidenav.js')}}"></script>



    @yield('js')
    @stack('scripts')

<script>
  var receiver_id = '';
  var my_id = "{{ Auth::id() }}";
  $(document).ready(function () {
    /* ajax setup form csrf token */
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('232f4c02474fcae40861', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      // alert(JSON.stringify(data));
      if (my_id == data.from) {
        $('#' + data.to).click();
      } else if (my_id == data.to) {
        if (receiver_id == data.from) {
          // if receiver is selected, reload the selected user ...
          $('#' + data.from).click();
        } else {
          // if receiver is not seleted, add notification for that user
          var pending = parseInt($('#' + data.from).find('.pending').html());

          if (pending) {
            $('#' + data.from).find('.pending').html(pending + 1);
          } else {
            $('#' + data.from).append('<span class="pending">1</span>');
          }
        }
      }    
    });

    $('.user').click(function () {
      $('.user').removeClass('active');
      $(this).addClass('active');
      $(this).find('.pending').remove();

      receiver_id = $(this).attr('id');
      $.ajax({
        type: "get",
        url: "message/" + receiver_id, // need to create this route
        data: "",
        cache: false,
        success: function (data) {
          $('#messages').html(data);
          scrollToBottomFunc();
        }
      });
    });

    $(document).on('keyup', '.input-text input', function (e) {
      var message = $(this).val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      // check if enter key is pressed and message is not null also receiver is selected
      if (e.keyCode == 13 && message != '' && receiver_id != '') {
        $(this).val(''); // while pressed enter text box will be empty

        var datastr = "receiver_id=" + receiver_id + "&message=" + message;
        $.ajax({
          type: "post",
          url: "message", // need to create this post route
          data: datastr,
          cache: false,
          success: function (data) {
            console.log(data);
          },
          error: function (jqXHR, status, err) {
          },
          complete: function () {
              scrollToBottomFunc();
          }
        })
      }
    });
  });
        
  // make a function to scroll down auto
  function scrollToBottomFunc() {
      $('.message-wrapper').animate({
          scrollTop: $('.message-wrapper').get(0).scrollHeight
      }, 50);
  }

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

    {{--$("#sidebar").mCustomScrollbar({
      theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });--}}
</script>
    
</body>
</html>