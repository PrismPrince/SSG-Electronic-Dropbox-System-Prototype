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
                    'url' => 'suggest',
                ]) !!}

                    <div class="form-group has-feedback col-md-12{{ $errors->has('student_id') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('student_id', 'Student ID', ['class' => 'control-label']) !!}
                        {!! Form::text('student_id', old('student_id'), [
                            'class' => 'form-control',
                            'required',
                            'maxlength' => 7,
                            'minlength' => 7,
                            'pattern' => '^[0-9]{7,7}$',
                            'data-error' => 'Please enter a valid ID!',
                            'placeholder' => '11xxxxx',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('student_id') ? $errors->first('student_id') : '' }}</div>
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('fname') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('fname', 'First Name', ['class' => 'control-label']) !!}
                        {!! Form::text('fname', old('fname'), [
                            'class' => 'form-control',
                            'required',
                            'maxlength' => 255,
                            'pattern' => '^[\s\-\.A-zÑñ]{1,255}$',
                            'data-error' => 'Please enter a valid name!',
                            'placeholder' => 'Enter your first name...',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('fname') ? $errors->first('fname') : '' }}</div>
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('mname') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('mname', 'Middle Name', ['class' => 'control-label']) !!}
                        {!! Form::text('mname', old('mname'), [
                            'class' => 'form-control',
                            'maxlength' => 255,
                            'pattern' => '^[\s\-\.A-zÑñ]{1,255}$',
                            'data-error' => 'Please enter a valid name!',
                            'placeholder' => 'Enter your middle name...',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('mname') ? $errors->first('mname') : '' }}</div>
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('lname') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('lname', 'Last Name', ['class' => 'control-label']) !!}
                        {!! Form::text('lname', old('lname'), [
                            'class' => 'form-control',
                            'required',
                            'maxlength' => 255,
                            'pattern' => '^[\s\-\.A-zÑñ]{1,255}$',
                            'data-error' => 'Please enter a valid name!',
                            'placeholder' => 'Enter your last name...',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('lname') ? $errors->first('lname') : '' }}</div>
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('addressed_to') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('addressed_to', 'Addressed To', ['class' => 'control-label']) !!}
                        {!! Form::text('addressed_to', old('addressed_to'), [
                            'class' => 'form-control',
                            'required',
                            'maxlength' => 255,
                            'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$',
                            'data-error' => 'Please enter a valid input!',
                            'placeholder' => 'Enter post title...',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('addressed_to') ? $errors->first('addressed_to') : '' }}</div>
                    </div>

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

                    <div class="form-group has-feedback col-md-12{{ $errors->has('message') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
                        {!! Form::textarea('message', old('message'), [
                            'class' => 'form-control',
                            'required',
                            'rows' => 7,
                            'data-error' => 'Please enter a valid input!',
                            'placeholder' => 'Enter suggestion message...',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('message') ? $errors->first('message') : '' }}</div>
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