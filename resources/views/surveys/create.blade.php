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
                    'url' => 'surveys',
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

                    <div class="form-group has-feedback col-md-12{{ $errors->has('start') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('start', 'Starts on', ['class' => 'control-label']) !!}
                        {!! Form::text('start', old('start'), [
                            'class' => 'form-control',
                            'required',
                            'pattern' => '^([0-9]|0[1-9]|1[012])[\/\-\.]([0-9]|0[0-9]|1[0-9]|2[0-9]|3[0-1])[\/\-\.]([1-2][09][019][0-9])(\s([0-9]|0[0-9]|1[0-2])\:([0-5][0-9])((\s[apAP][mM])|([apAP][mM])))?$',
                            'data-error' => 'Please enter a valid date!',
                            'placeholder' => 'mm/dd/yyyy optional(hh:mm am/pm)',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('start') ? $errors->first('start') : '' }}</div>
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('end') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('end', 'Ends on', ['class' => 'control-label']) !!}
                        {!! Form::text('end', old('end'), [
                            'class' => 'form-control',
                            'required',
                            'pattern' => '^([0-9]|0[1-9]|1[012])[\/\-\.]([0-9]|0[0-9]|1[0-9]|2[0-9]|3[0-1])[\/\-\.]([1-2][09][019][0-9])(\s([0-9]|0[0-9]|1[0-2])\:([0-5][0-9])((\s[apAP][mM])|([apAP][mM])))?$',
                            'data-error' => 'Please enter a valid date!',
                            'placeholder' => 'mm/dd/yyyy optional(hh:mm am/pm)',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('end') ? $errors->first('end') : '' }}</div>
                    </div>

                        <div class="form-group has-feedback col-md-12{{ $errors->has('options[]') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('options[]', 'Answers', ['class' => 'control-label']) !!}
                            <div id="options">
                                {!! Form::text('options[]', old('options[]'), [
                                    'class' => 'form-control',
                                    'required',
                                    'maxlength' => 255,
                                    'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$',
                                    'data-error' => 'Please enter a valid input!',
                                    'placeholder' => 'Answer...',
                                ]) !!}
                            </div>
                            <div class="help-block with-errors">{{ $errors->has('options[]') ? $errors->first('options[]') : '' }}</div>
                        </div>
                            <button id="add-option" class="btn btn-default" type="button">+</button>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#add-option').on('click', function(){
                                $('#options').append('{{ Form::text('options[]', old('options[]'), [
                                    'class' => 'form-control',
                                    'maxlength' => 255,
                                    'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$',
                                    'data-error' => 'Please enter a valid input!',
                                    'placeholder' => 'Answer...',
                                ]) }}');
                            });
                        });
                    </script>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('desc') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('desc', 'Description', ['class' => 'control-label']) !!}
                        {!! Form::textarea('desc', old('desc'), [
                            'class' => 'form-control',
                            'required',
                            'rows' => 7,
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