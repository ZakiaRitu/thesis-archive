<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{!! $title or \App\ProjectSettings\Setting::$projectName !!}</title>

    <!-- PLUGINS CSS STYLE -->
    <link href="{!! asset('plugins/jquery-ui/jquery-ui.min.css') !!}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{!! asset('plugins/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{!! asset('plugins/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">

    <!-- Toastr style -->
    {!! Html::style('assets/toastr/toastr.min.css') !!}



    @yield('style')
    <!-- CUSTOM CSS -->
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">

    <!-- FAVICON -->
    <link href="{!!  asset("img/favicon.ico") !!}" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



    <style>
        a.nav-link {
            color: white;
        }

        a.navbar-brand {
            color: white;
        }

        .footer-bottom {
            /*position: fixed;*/
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1.5rem;
            text-align: center;
        }

        .page-title {
            background: #62792c87;
            padding: 14px 0;
        }

        .page-title h3 {
            color: #fff;
            font-size: 33px;
            letter-spacing: 1px;
            line-height: 1;
            margin-bottom: 4px;
            font-family: cursive;
        }
    </style>
</head>

