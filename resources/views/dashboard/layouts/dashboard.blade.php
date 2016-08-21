<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Outline Roofing</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/dashboard-extras.css') }}" rel="stylesheet">

    <link href="{{{ asset('/css/dashboard.css') }}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        @include('layouts._partials.flash')
        @include('dashboard.layouts._partials.nav')

        <div id="page-wrapper">
            @yield('content')
        </div>
    </div>

    @yield('modal')
    
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/dashboard.js') }}"></script>
    <script src="{{ asset('/js/dashboard/app.js') }}"></script>


    @yield('scripts')

</body>

</html>
