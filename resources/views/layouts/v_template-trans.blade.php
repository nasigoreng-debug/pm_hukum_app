<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('template-trans')}}/assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('template-trans')}}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('template-trans')}}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{ asset('template-trans')}}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="{{ asset('template-trans')}}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('template-trans')}}/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{ asset('template-trans')}}/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('template-trans')}}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('template-trans')}}/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('template-trans')}}/assets/css/app.css" rel="stylesheet">
    <link href="{{ asset('template-trans')}}/assets/css/icons.css" rel="stylesheet">

    <title>Dashtrans - Bootstrap5 Admin Template</title>
</head>

<body class="bg-theme bg-theme2">
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('layouts.v_sidebar-trans')
        <!--end sidebar wrapper -->

        <!--start header -->
        @include('layouts.v_header-trans')
        <!--end header -->

        <!--start page wrapper -->
        @yield('content')
        <!--end page wrapper -->

        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr />
            <p class="mb-0">Gaussian Texture</p>
            <hr>
            <ul class="switcher">
                <li id="theme1"></li>
                <li id="theme2"></li>
                <li id="theme3"></li>
                <li id="theme4"></li>
                <li id="theme5"></li>
                <li id="theme6"></li>
            </ul>
            <hr>
            <p class="mb-0">Gradient Background</p>
            <hr>
            <ul class="switcher">
                <li id="theme7"></li>
                <li id="theme8"></li>
                <li id="theme9"></li>
                <li id="theme10"></li>
                <li id="theme11"></li>
                <li id="theme12"></li>
                <li id="theme13"></li>
                <li id="theme14"></li>
                <li id="theme15"></li>
            </ul>
        </div>
    </div>
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('template-trans')}}/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="{{ asset('template-trans')}}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('template-trans')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{ asset('template-trans')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{ asset('template-trans')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="{{ asset('template-trans')}}/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="{{ asset('template-trans')}}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template-trans')}}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#Transaction-History').DataTable({
                lengthMenu: [
                    [6, 10, 20, -1],
                    [6, 10, 20, 'Todos']
                ]
            });
        });
    </script>
    <script src="{{ asset('template-trans')}}/assets/js/index.js"></script>
    <!--app JS-->
    <script src="{{ asset('template-trans')}}/assets/js/app.js"></script>
    <script>
        new PerfectScrollbar('.product-list');
        new PerfectScrollbar('.customers-list');
    </script>
    <!--plugins-->
    <script src="{{ asset('template-trans')}}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('template-trans')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{ asset('template-trans')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{ asset('template-trans')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="{{ asset('template-trans')}}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template-trans')}}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>


    <!-- <script>
		$(document).ready(function() {
			$('#example').DataTable(
			  
			  );
			$("div.dataTables_filter input").focus();
		  } );
	</script> -->


    <script>
        $(document).ready(function() {
            $('#example').DataTable()
        });
    </script>


    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>

</html>