<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Create Post</h3>
    </div>
    {!! Form::open([
        'class' => 'form-horizontal',
        'data-toggle' => 'validator',
        'role' => 'form',
        'url' => 'posts',
        'enctype' => 'multipart/form-data',
    ]) !!}
        <div class="panel-body">
            <div class="img col-xs-1">
                <img src="{{ url('img/pic.jpg') }}" alt="">
            </div>
            <div class="cont col-xs-11">
                {!! Form::text('title', old('title'), [
                    'class' => 't',
                    'required',
                    'maxlength' => 255,
                    'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$',
                    'data-error' => 'Please enter a valid input!',
                    'placeholder' => 'What\'s on your mind?',
                ]) !!}
                {!! Form::textarea('desc', old('desc'), [
                    'class' => 'd',
                    'required',
                    'rows' => 3,
                    'data-error' => 'Please enter a valid input!',
                    'placeholder' => 'Enter post description...',
                ]) !!}
                <div class="i-img">
                    {!! Form::file('image', [
                        'class' => 'img-up',
                    ]) !!}
                    {!! Form::button('&times;', ['class' => 'img-dismiss text-center']) !!}
                </div>
            </div>
        </div>
        <div class="panel-footer clearfix">
            {!! Form::button('Post', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
        </div>
    {!! Form::close() !!}
</div>