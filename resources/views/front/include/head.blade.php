
<head>
    @yield('pre_head')

    <meta charset="utf-8">
    <title>{{ allSettings('company_name') }} | @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset(path_image().allSettings('fav_icon'))}}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- normalize css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/normalize.css') }}">
    <!-- bootsrtap css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
     <!-- flaticon css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/flaticon.css') }}">
     <!-- slick css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/slick.css') }}">
    <!-- magnific-popup css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/magnific-popup.css') }}">
    <!-- nice-select css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/nice-select.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/flaticon.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">
    <!-- all css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}">

    @yield('post_head')

  </head>
