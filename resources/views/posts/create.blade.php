@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                {!! Form::open([
                    'class' => 'form-horizontal',
                    'data-toggle' => 'validator',
                    'role' => 'form',
                    'url' => 'posts',
                ]) !!}

                    <div class="form-group has-feedback col-md-12{{ $errors->has('title') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                        {!! Form::text('title', old('title'), [
                            'class' => 'form-control',
                            'required',
                            'maxlength' => 255,
                            'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$',
                            'data-error' => 'Please enter a valid input!',
                            'placeholder' => 'Enter post title...',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('title') ? $errors->first('title') : '' }}</div>
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('desc') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('desc', 'Description', ['class' => 'control-label']) !!}
                        {!! Form::textarea('desc', old('desc'), [
                            'class' => 'form-control',
                            'required',
                            'rows' => '10',
                            'data-error' => 'Please enter a valid input!',
                            'placeholder' => 'Enter post description...',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('desc') ? $errors->first('desc') : '' }}</div>
                    </div>

                    <div class="form-group col-md-12">
                        {!! Form::button('Post', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                        {!! Html::linkRoute('posts.index', 'Cancel', null, ['class' => 'btn btn-default']) !!}
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection