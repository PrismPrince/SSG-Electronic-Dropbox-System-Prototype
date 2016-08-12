<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" content="Dave Dane Pacilan">

    <title>@yield('title')</title>

    {!! Html::style('css/bootstrap.min.css') !!}
    <!--{!! Html::style('css/bootstrap-theme.min.css') !!}-->
    {!! Html::style('css/cropper.min.css') !!}
    {!! Html::style('css/datetimepicker.min.css') !!}
    {!! Html::style('css/custom.css') !!}
    {!! Html::style('https://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700') !!}

    <style type="text/css">
        body {
            background-color: #e9ebee;
        }
        nav.navbar {
            background-color: #3b5998;
            border-bottom: 1px solid #29487d;
        }
        nav.navbar button > span {
            background-color: #fff;
        }
        .nb-bnt, .nb-brnd, .nb-m-l > li > a, .nb-u > li > a,
        .nb-d > a {
            color: #fff;
        }
        .nb-d-m > li > a:hover, .nb-d-m > li > a:focus {
            background-color: #4267b2;
            color: #fff;
        }
        .open > a {
            background-color: #4267b2 !important;
            color: #fff;
        }
        .nb-m-l > li > a:focus, .nb-u > li > a:focus,
        .nb-m-l > li > a:hover, .nb-u > li > a:hover {
            background-color: #4267b2;
            color: #fff;
        }
        .nb-brnd:hover, .nb-brnd:focus {
            color: #fff;
        }
    </style>

    @yield('styles')

    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/momentjs.js') !!}
    {!! Html::script('js/datetimepicker.min.js') !!}
    {!! Html::script('js/validator.min.js') !!}
    {!! Html::script('js/cropper.min.js') !!}

    <script type="text/javascript">
        
    </script>

    @yield('scripts')
</head>