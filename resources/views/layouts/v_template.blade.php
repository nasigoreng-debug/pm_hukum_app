<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />

    <title>{{ $title }} | Panmud Hukum</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="{{ asset('public/template') }}/assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="{{ asset('public/template') }}/assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/template') }}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('public/template') }}/assets/css/xenon-core.css">
    <link rel="stylesheet" href="{{ asset('public/template') }}/assets/css/xenon-forms.css">
    <link rel="stylesheet" href="{{ asset('public/template') }}/assets/css/xenon-components.css">
    <link rel="stylesheet" href="{{ asset('public/template') }}/assets/css/xenon-skins.css">
    <link rel="stylesheet" href="{{ asset('public/template') }}/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <!-- Additional styles -->
    <link rel="stylesheet" href="{{ asset('public/template') }}/assets/css/fonts/meteocons/css/meteocons.css">
    <link rel="stylesheet" href="{{ asset('public/template') }}/assets/js/datatables/dataTables.bootstrap.css">
    
    <link rel="shortcut icon" href="{{ asset('public/favicon/favicon.ico') }}">

    <script src="{{ asset('public/template') }}/assets/js/jquery-1.11.1.min.js"></script>

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
        <!-- Sidebar -->
        @include('layouts.v_sidebar')
        <!-- /Sidebar -->

        <div class="main-content">
            <!-- Navbar -->
            @include('layouts.v_nav')
            <!-- /Navbar -->

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->

            <!-- Footer -->
            @include('layouts.v_footer')
            <!-- /Footer -->
        </div>
    </div>

    <!-- Bottom Scripts -->
    <script src="{{ asset('public/template') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/TweenMax.min.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/resizeable.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/joinable.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/xenon-api.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/xenon-toggles.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/jquery-validate/jquery.validate.min.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/toastr/toastr.min.js"></script>

    <!-- Imported scripts on this page -->
    <script src="{{ asset('public/template') }}/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/jvectormap/regions/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/xenon-widgets.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/datatables/dataTables.bootstrap.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
    <script src="{{ asset('public/template') }}/assets/js/datatables/tabletools/dataTables.tableTools.min.js"></script>
    <script>
    function updateIndonesianDate() {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            timeZone: 'Asia/Jakarta'
        };
        
        const formatter = new Intl.DateTimeFormat('id-ID', options);
        const formatted = formatter.format(now);
        
        document.getElementById('indonesian-date').textContent = formatted;
    }

    // Update immediately
    updateIndonesianDate();

    // Update every second
    setInterval(updateIndonesianDate, 1000);
    </script>

    <script>
        function updateForecastTimes() {
            const now = new Date();
            const forecastEntries = document.querySelectorAll('.xe-forecast-entry time');
            
            forecastEntries.forEach((element, index) => {
                const forecastTime = new Date(now.getTime() + (index + 1) * 60 * 60 * 1000);
                const hours = forecastTime.getHours().toString().padStart(2, '0');
                const minutes = forecastTime.getMinutes().toString().padStart(2, '0');
                
                element.textContent = `${hours}:${minutes}`;
            });
        }

        // Update setiap jam
        updateForecastTimes();
        setInterval(updateForecastTimes, 60 * 60 * 1000);
    </script>

    <!-- JavaScripts initializations and stuff -->
    <script src="{{ asset('public/template') }}/assets/js/xenon-custom.js"></script>

 
</body>
</html>