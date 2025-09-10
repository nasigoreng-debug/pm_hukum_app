<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />

    <title> {{ $title }} | Panmud Hukum</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="{{ asset('public/template')}}/assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="{{ asset('public/template')}}/assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/template')}}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('public/template')}}/assets/css/xenon-core.css">
    <link rel="stylesheet" href="{{ asset('public/template')}}/assets/css/xenon-forms.css">
    <link rel="stylesheet" href="{{ asset('public/template')}}/assets/css/xenon-components.css">
    <link rel="stylesheet" href="{{ asset('public/template')}}/assets/css/xenon-skins.css">
    <link rel="stylesheet" href="{{ asset('public/template')}}/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="{{{ asset('public/favicon/favicon.ico') }}}">
    
    <!-- Tambahkan CSS untuk tabel responsif -->
    <style>
        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }
        
        /* Styling untuk tabel pada perangkat mobile */
        @media screen and (max-width: 767px) {
            table {
                font-size: 12px;
            }
            
            /* Opsional: membuat header tabel tetap saat di-scroll */
            .table-responsive table {
                min-width: 600px; /* Sesuaikan dengan lebar konten tabel */
            }
            
            /* Tombol aksi pada mobile */
            .btn {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }
        }
    </style>

    <script src="{{ asset('public/template')}}/assets/js/jquery-1.11.1.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="page-body">
    <div class="page-loading-overlay">
        <div class="loader-2"></div>
    </div>
    <div class="page-container">

            <!-- Main content -->
            {{-- @include('layouts.v_sidebar') --}}
            <!-- /Sidebar -->

            <div class="main-content">

            <!-- Navbar -->
            {{-- @include('layouts.v_nav') --}}
            <!-- /Navbar -->

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->

            <!-- Footer -->
            @include('layouts.v_footer')
            <!-- /Footer -->


        </div>

    </div>

    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="{{ asset('public/template')}}/assets/css/fonts/meteocons/css/meteocons.css">
    <link rel="stylesheet" href="{{ asset('public/template')}}/assets/js/datatables/dataTables.bootstrap.css">

    <!-- Bottom Scripts -->
    <script src="{{ asset('public/template')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/template')}}/assets/js/TweenMax.min.js"></script>
    <script src="{{ asset('public/template')}}/assets/js/resizeable.js"></script>
    <script src="{{ asset('public/template')}}/assets/js/joinable.js"></script>
    <script src="{{ asset('public/template')}}/assets/js/xenon-api.js"></script>
    <script src="{{ asset('public/template')}}/assets/js/xenon-toggles.js"></script>
    <script src="{{ asset('public/template')}}/assets/js/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/template')}}assets/js/jquery-validate/jquery.validate.min.js"></script>
    <script src="{{ asset('public/template')}}assets/js/toastr/toastr.min.js"></script>

    <!-- Imported scripts on this page -->
    <script src="{{ asset('public/template')}}/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ asset('public/template')}}/assets/js/jvectormap/regions/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('public/template')}}/assets/js/xenon-widgets.js"></script>
    <script src="{{ asset('public/template')}}/assets/js/datatables/dataTables.bootstrap.js"></script>
    <script src="{{ asset('public/template')}}/assets/js/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
    <script src="{{ asset('public/template')}}/assets/js/datatables/tabletools/dataTables.tableTools.min.js"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="{{ asset('public/template')}}/assets/js/xenon-custom.js"></script>

</body>

</html>