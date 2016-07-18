<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            {!! Html::link('/', 'Prism', ['class' => 'navbar-brand']) !!}
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li>{!! Html::link('home', 'Home') !!}</li>
                <li>{!! Html::link('posts', 'Posts') !!}</li>
                <li>{!! Html::link('users', 'Users') !!}</li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li>{!! Html::link('login', 'Login') !!}</li>
                    <li>{!! Html::link('register', 'Register') !!}</li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->fname }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            {{--<li class="dropdown-header">Hi</li>
                            <li class="divider" role="separator"></li>--}}
                            <li>{!! Html::link('logout', 'Logout') !!}</li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>