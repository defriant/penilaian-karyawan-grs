<!doctype html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/font-awesome-pro-master/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
    <!-- Env Color -->
    <link rel="stylesheet" href="{{ asset('assets/css/envColor.css') }}">
    <script src="{{ asset('assets/scripts/envColor.js') }}"></script>
    {{-- Datetime picker --}}
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/yearpicker.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.ico') }}">
    <style>
        .ui-datepicker-calendar {
            display: none;
        }
        
        .yearpicker-container {
            font-size: 1.5rem !important;
        }
    </style>
</head>

<body>
    <div id="wrapper" class="no-print">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="/"><img src="{{ asset('assets/img/logo_phd.png') }}" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('assets/img/admin.png') }}" class="img-circle" alt="Avatar"> <span>{{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="sidebar-nav" class="sidebar no-print">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li>
                            <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="/karyawan" class="{{ Request::is('karyawan') ? 'active' : '' }}"><i class="fal fa-users"></i> <span>Data Karyawan</span></a>
                        </li>
                        <li>
                            <a href="/penilaian" class="{{ Request::is('penilaian') ? 'active' : '' }}"><i class="fal fa-chart-line"></i> <span>Penilaian</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        
        <div class="main">
            <div class="main-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; {{ date('Y') }}. All Rights Reserved.</p>
            </div>
        </footer>
    </div>

    <div id="printarea">
        <img src="{{ asset('assets/img/logo_phd.png') }}" class="print-logo">
        <div class="print-title">
            <h3>Penilaian Karyawan</h3>
            <span>Periode November 2022</span>
        </div>
        <div class="print-table">
            <table class="table table-bordered" id="table-penilaian" style="">
                <thead style="height: 30px">
                    <tr id="print-thead-penilaian"></tr>
                </thead>
                <tbody id="print-tbody-penilaian"></tbody>
            </table>
        </div>
    </div>
    
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/scripts/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/klorofil-common.js') }}"></script>
    <script src="{{ asset('assets/scripts/main.js') }}"></script>

    @if (Request::is('dashboard'))
    <script src="{{ asset('assets/pages/dashboard.js') }}"></script>
    @endif

    @if (Request::is('karyawan'))
    <script src="{{ asset('assets/pages/karyawan.js') }}"></script>
    @endif

    @if (Request::is('penilaian'))
    <script src="{{ asset('assets/pages/penilaian.js') }}"></script>
    @endif
</body>

</html>
