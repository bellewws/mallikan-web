<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MALL IKAN ADMIN') }}</title>

    <title>MALL IKAN</title>

    <title>{{ config('app.name', 'MALL IKAN ADMIN') }}</title>

    <link rel="icon" href="/assets/logo-biru.png" type="image/png" sizes="16x16">
    <!-- Styles -->
    <link href="{{ url('/css/app.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{url('css/barcode-style.css')}}">
    {{-- <link href="{{ url('/css/rtl.css') }}" rel="stylesheet">  --}}

    <!-- CSS datatable -->

    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.bootstrap4.min.css">  --}}

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/propellerkit@1.3.1/dist/css/propeller.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/propellerkit-datetimepicker@1.2.0/css/pmd-datetimepicker.css">
    
	@yield('css')
</head>

<body class="app">

    @include('admin.partials.spinner')

    <div>
        <!-- #Left Sidebar ==================== -->
        @include('admin.partials.sidebar')

        <!-- #Main ============================ -->
        <div class="page-container">
            <!-- ### $Topbar ### -->
            @include('admin.partials.topbar')

            <!-- ### $App Screen Content ### -->
            <main class='main-content bgc-grey-100'>
                <div id='mainContent'>
                    <div class="container-fluid">

                        <h4 class="c-grey-900 mT-10 mB-30">@yield('page-header')</h4>

						@include('admin.partials.messages') 
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

 
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>  --}}

    @yield('js')
    @stack('scripts')
    {{--  @yield('script.js')  --}}

</body>

</html>
