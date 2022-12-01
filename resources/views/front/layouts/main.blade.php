<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title')
            Help Desk | FG
        @show </title>
    <link rel="icon" type="image/x-icon" href="{{asset('icons/repair.svg')}}">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="{{asset('dist/css/front/styles.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/front/chat_styles.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owlcarousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owlcarousel/css/owl.theme.default.min.css')}}">
</head>
<body>

@yield('content')

@include('front.components.footer')

<script src="{{ asset('dist/js/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script defer src="{{ asset('plugins/owlcarousel/js/owl.carousel.min.js') }}"></script>
<script defer src="{{ asset('dist/js/carousel_driver.js') }}"></script>

<!-- User javascript -->
<script src="{{ asset('dist/js/tables/act/delete_row.js') }}"></script>
<script src="{{ asset('dist/js/tables/act/add_row.js') }}"></script>

</body>
</html>
