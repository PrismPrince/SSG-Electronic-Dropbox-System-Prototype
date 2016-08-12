<div class="row">
    <div class="col-xs-12">
        <div class="jumbotron">
            <div class="cover">
                @if (Auth::user()->id == $user->id)
                    <a class="camera open-modal" href="#" data-upload="cover"><span class="glyphicon glyphicon-camera"></span></a>
                @endif
                <h2 class="text-center">{{ $user->fname . ' ' . $user->lname }}</h2>
            </div>
            <nav class="navbar navbar-static-top tb">
                <div class="container">
                    <div class="dp navbar-header col-md-2 col-sm-3">
                        <div class="wrapper">
                            @if (Auth::user()->id == $user->id)
                                <a class="camera open-modal" href="#" data-upload="avatar"><span class="glyphicon glyphicon-camera"></span></a>
                            @endif
                        </div>
                    </div>
                    <h2 class="u-n text-center">{{ $user->fname . ' ' . $user->lname }}</h2>
                    <ul class="nav navbar-nav text-center col-md-10 col-sm-9 col-xs-12">
                        <li>
                            @if (Route::is('profile.timeline'))
                                <a class="a-a" href="#">
                                    <span class="glyphicon glyphicon-time"></span>
                                    <span class="a-x">Timeline</span>
                                </a>
                                <span class="down glyphicon glyphicon-triangle-top"></span>
                            @else
                                <a href="{{ url('profile/' . $user->id . '/timeline') }}">
                                    <span class="glyphicon glyphicon-time"></span>
                                    <span class="a-x">Timeline</span>
                                </a>
                            @endif
                        </li>
                        <li>
                            @if (Route::is('profile.about'))
                                <a class="a-a" href="#">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <span class="a-x">About</span>
                                </a>
                                <span class="down glyphicon glyphicon-triangle-top"></span>
                            @else
                                <a href="{{ url('profile/' . $user->id . '/about') }}">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <span class="a-x">About</span>
                                </a>
                            @endif
                        <li>
                            @if (Route::is('profile.posts'))
                                <a class="a-a" href="#">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                    <span class="a-x">Posts</span>
                                </a>
                                <span class="down glyphicon glyphicon-triangle-top"></span>
                            @else
                                <a href="{{ url('profile/' . $user->id . '/posts') }}">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                    <span class="a-x">Posts</span>
                                </a>
                            @endif
                        </li>
                        <li>
                            @if (Route::is('profile.surveys'))
                                <a class="a-a" href="#">
                                    <span class="glyphicon glyphicon-stats"></span>
                                    <span class="a-x">Surveys</span>
                                </a>
                                <span class="down glyphicon glyphicon-triangle-top"></span>
                            @else
                                <a href="{{ url('profile/' . $user->id . '/surveys') }}">
                                    <span class="glyphicon glyphicon-stats"></span>
                                    <span class="a-x">Surveys</span>
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="modal fade upload" aria-labelledby="modalLabel" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Crop and Upload Photo</h4>
            </div>
            {!! Form::open([
                'class' => 'form-horizontal form-upload',
                'role' => 'form',
                'enctype' => 'multipart/form-data',
            ]) !!}
                <div class="modal-body">
                    <div class="u-box">
                        {!! Form::file('image', [
                            'class' => 'u-up',
                        ]) !!}
                    </div>
                    {!! Form::hidden('x', null, ['class' => 'i-x']) !!}
                    {!! Form::hidden('y', null, ['class' => 'i-y']) !!}
                    {!! Form::hidden('w', null, ['class' => 'i-w']) !!}
                    {!! Form::hidden('h', null, ['class' => 'i-h']) !!}
                    {!! Form::hidden('upload', null, ['class' => 'i-upload']) !!}
                    <div>
                        <img class="i-u" src="">
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::button('Close', ['type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::button('Post', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>