<div class="row">
    <div class="col-xs-12">
        <div class="jumbotron">
            <div class="cover" style="background: url({{ url('img/cover.jpg') }}) no-repeat;background-size: 100% auto;">
                @if (Auth::user()->id == $user->id)
                    <a class="camera" href="{{ url('profile/' . Auth::user()->id . '/upload/cover') }}"><span class="glyphicon glyphicon-camera"></span></a>
                @endif
            </div>
            <nav class="navbar navbar-static-top tb">
                <div class="container">
                    <div class="dp navbar-header col-md-2 col-sm-3">
                        <div class="wrapper">
                            <img class="img-responsive img-thumbnail" src="{{ url('img/pic.jpg') }}" alt="Profile Pic">
                            @if (Auth::user()->id == $user->id)
                                <a class="camera" href="{{ url('profile/' . Auth::user()->id . '/upload') }}"><span class="glyphicon glyphicon-camera"></span></a>
                            @endif
                            <h2 class="text-center">{{ $user->fname . ' ' . $user->lname }}</h2>
                        </div>
                    </div>
                    <ul class="nav navbar-nav text-center col-md-10 col-sm-9 col-xs-12">
                        <li>
                            @if (Route::is('profile.timeline'))
                                {!! Html::link('#', 'Timeline', ['class' => 'a-a']) !!}
                                <span class="glyphicon glyphicon-triangle-top"></span>
                            @else
                                {!! Html::link('profile/' . $user->id . '/timeline', 'Timeline') !!}
                            @endif
                        </li>
                        <li>
                            @if (Route::is('profile.about'))
                                {!! Html::link('#', 'About', ['class' => 'a-a']) !!}
                                <span class="glyphicon glyphicon-triangle-top"></span>
                            @else
                                {!! Html::link('profile/' . $user->id . '/about', 'About') !!}
                            @endif
                        <li>
                            @if (Route::is('profile.posts'))
                                {!! Html::link('#', 'Posts', ['class' => 'a-a']) !!}
                                <span class="glyphicon glyphicon-triangle-top"></span>
                            @else
                                {!! Html::link('profile/' . $user->id . '/posts', 'Posts') !!}
                            @endif
                        </li>
                        <li>
                            @if (Route::is('profile.surveys'))
                                {!! Html::link('#', 'Surveys', ['class' => 'a-a']) !!}
                                <span class="glyphicon glyphicon-triangle-top"></span>
                            @else
                                {!! Html::link('profile/' . $user->id . '/surveys', 'Surveys') !!}
                            @endif
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>