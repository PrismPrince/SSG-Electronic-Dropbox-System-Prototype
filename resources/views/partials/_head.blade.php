<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" content="Dave Dane Pacilan">

    <title>@yield('title')</title>

    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/bootstrap-theme.min.css') !!}
    {!! Html::style('css/custom.css') !!}

    <style type="text/css">
        /* latin */
        @font-face {
          font-family: 'Droid Sans';
          font-style: normal;
          font-weight: 400;
          src: local('Droid Sans'), local('DroidSans'), url(http://fonts.gstatic.com/s/droidsans/v6/s-BiyweUPV0v-yRb-cjciPk_vArhqVIZ0nv9q090hN8.woff2) format('woff2');
          unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
        }
        /* latin */
        @font-face {
          font-family: 'Droid Sans';
          font-style: normal;
          font-weight: 700;
          src: local('Droid Sans Bold'), local('DroidSans-Bold'), url(http://fonts.gstatic.com/s/droidsans/v6/EFpQQyG9GqCrobXxL-KRMYWiMMZ7xLd792ULpGE4W_Y.woff2) format('woff2');
          unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
        }
        body {
            font-family: 'Droid Sans', Arial, Helvetica, Geneva, sans-serif;
        }
    </style>

    @yield('styles')

    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/validator.min.js') !!}

    @yield('scripts')
</head>