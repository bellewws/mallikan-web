<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MALL IKAN</title>

    <title>{{ config('app.name', 'MALL IKAN') }}</title>

    <link rel="icon" href="/assets/logo-biru.png" type="image/png" sizes="20x20">
    <link rel="stylesheet" href="{{url('css2/style-profile.css')}}">
    <link rel="stylesheet" href="{{url('css/style-order-detail.css')}}">

    <!-- Styles -->
    <link href="{{ url('/css/app.css') }}" rel="stylesheet"> 


	{{-- <link href="{{ url('/css/rtl.css') }}" rel="stylesheet">  --}}
	
	@yield('css')

</head>

<body class="app">

    @include('toko.partials.spinner')

    <div>
        <!-- #Left Sidebar ==================== -->
        @include('toko.partials.sidebar')

        <!-- #Main ============================ -->
        <div class="page-container">
            <!-- ### $Topbar ### -->
            @include('toko.partials.topbar')

            <!-- ### $App Screen Content ### -->
            <main class='main-content bgc-grey-100'>
                <div id='mainContent'>
                    <div class="container-fluid">

                        <h4 class="c-grey-900 mT-10 mB-30">@yield('page-header')</h4>

						@include('toko.partials.messages') 
						@yield('content')

                    </div>
                </div>
            </main>

            <!-- ### $App Screen Footer ### -->
            <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                <span>Copyright © {{ date('Y') }} Designed by
                    <a href="https://colorlib.com" target='_blank' title="Colorlib">Colorlib</a>. All rights reserved.</span>
            </footer>
        </div>
    </div>

    <script src="{{ url('/js/app.js') }}"></script>
    <script src="{{ url('js/jquery-3.2.1.min.js') }}"></script>
    

    @yield('js')
    @stack('scripts')

</body>

</html>
