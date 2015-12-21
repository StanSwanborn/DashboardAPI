<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Dashboard - Ace Admin</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/bootstrap.css") }}" />
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/font-awesome.css") }}" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/ace-fonts.css") }}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/ace.css") }}" class="ace-main-stylesheet" id="main-ace-style" />

    <!-- General Style (custome style) -->
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/general.css") }}" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/ace-part2.css") }}" class="ace-main-stylesheet" />
    <![endif]-->

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/ace-ie.css") }}" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ app('url')->asset("css/dashboard/assets/js/ace-extra.js") }}"></script>

    <!-- HTML5shiv and Respond.js") }} for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{ app('url')->asset(" css/dashboard/assets/js/html5shiv.js") }}"></script>
    <script src="{{ app('url')->asset("css/dashboard/assets/js/respond.js") }}" ></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="{{ app('url')->asset("css/dashboard/assets/js/jquery/jquery-2.1.4.min.js") }}"></script>

    <!-- jQuery UI -->
    <script src="{{ app('url')->asset("css/dashboard/assets/js/jquery-ui.js") }}"></script>
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/jquery-ui.css") }}" />
</head>
<body class="no-skin">
    @include('dashboard.layout.nav')

    <div class="main-container" id="main-container">
        @include('dashboard.layout.sidebar')

        @yield('content')
    </div><!-- /.main-container -->

    @include('dashboard.layout.footer')
</body>
</html>
