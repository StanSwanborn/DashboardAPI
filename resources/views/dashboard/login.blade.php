<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Login Page - Ace Admin</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/bootstrap.css") }}" />
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/font-awesome.css") }}" />

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/ace-fonts.css") }}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/ace.css") }}" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/ace-part2.css") }}" />
    <![endif]-->
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/ace-rtl.css") }}" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ app('url')->asset("css/dashboard/assets/css/ace-ie.css") }}" />
    <![endif]-->

    <!-- HTML5 shim and Respond.js") }} IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="{{ app('url')->asset("css/dashboard/assets/js/html5shiv.js") }}"></script>
    <
    script;
    src = "{{ app('url')->asset("
    css / dashboard / assets / js / respond.js;
    ") }}" >;</script>
    <![endif]-->
</head>
<body class="login-layout" style="background-image: url('//www.kundenmeister.com/crm/css/assets_new/css/images/meteorshower2.jpg')">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="ace-icon fa fa-book green"></i>
                            <span class="red">KundenMeister</span>
                            <span class="white" id="id-text2">API</span>
                        </h1>
                        <h4 class="blue" id="id-company-text">&copy; Koerbler</h4>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="ace-icon fa fa-user green"></i>
                                        Login with authorized Koerbler account
                                    </h4>
                                    <p style="color: red">
                                        {{ session('status') }}
                                    </p>

                                    <div class="space-6"></div>

                                    <form method="post" action="{{ route('dashboard.authorizeClient') }}">
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="username" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="password" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <button type="submit" name="action" value="login" class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">Login</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
    </body>
</html>