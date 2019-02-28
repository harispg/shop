
<!--
*
*  INSPINIA - Responsive Admin Theme
*  version 2.8
*
-->

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content={{ csrf_token() }} />

    <title>INSPINIA | Dashboard</title>

    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link href="/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">


    @yield('pluginCSS')
    <!-- Toastr style -->
    {{-- <link href="/inspinia/css/plugins/toastr/toastr.min.css" rel="stylesheet"> --}}

    <!-- Gritter -->
    <!-- <link href="/inspinia/js/plugins/gritter/jquery.gritter.css" rel="stylesheet"> -->

    <link href="/inspinia/css/animate.css" rel="stylesheet">
    <link href="/inspinia/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        @include('admin.nav')

        <div id="page-wrapper" class="gray-bg dashbard-1">

        <div class="row border-bottom">
        @include('admin.nav-top')
        </div>

        @yield('content')


        <div class="footer">
            <div class="float-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2018
            </div>
        </div>
        </div>
        

    </div>

    <!-- Mainly scripts -->
    <script src="/js/app.js"></script>
    <script src="/inspinia/js/jquery-3.1.1.min.js"></script>
    <script src="/inspinia/js/popper.min.js"></script>
    <script src="/inspinia/js/bootstrap.js"></script>
    <script src="/inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    @yield('mainlyScripts')

    <!-- Flot -->
    {{-- <script src="/inspinia/js/plugins/flot/jquery.flot.js"></script>
    <script src="/inspinia/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/inspinia/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/inspinia/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/inspinia/js/plugins/flot/jquery.flot.pie.js"></script> --}}

    <!-- Peity -->
    {{-- <script src="/inspinia/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/inspinia/js/demo/peity-demo.js"></script> --}}

    <!-- Custom and plugin javascript -->
    <script src="/inspinia/js/inspinia.js"></script>
    <script src="/inspinia/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="/inspinia/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    @yield('pluginScripts')

    <!-- GITTER -->
    {{-- <script src="/inspinia/js/plugins/gritter/jquery.gritter.min.js"></script> --}}

    <!-- Sparkline -->
    {{-- <script src="/inspinia/js/plugins/sparkline/jquery.sparkline.min.js"></script> --}}

    <!-- Sparkline demo data  -->
    {{-- <script src="/inspinia/js/demo/sparkline-demo.js"></script> --}}

    <!-- ChartJS-->
    {{-- <script src="/inspinia/js/plugins/chartJs/Chart.min.js"></script> --}}

    <!-- Toastr -->
    {{-- <script src="/inspinia/js/plugins/toastr/toastr.min.js"></script> --}}


    @yield('script')
</body>
</html>