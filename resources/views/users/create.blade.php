@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open([
                'class' => 'form-horizontal',
                'data-toggle' => 'validator',
                'role' => 'form',
                'url' => 'users',
            ]) !!}
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

                <div class="form-group has-feedback col-md-12{{ $errors->has('username') ? ' has-error has-danger' : '' }}">
                    {!! Form::label('username', 'Username', ['class' => 'control-label']) !!}
                    {!! Form::text('username', old('username'), [
                        'class' => 'form-control',
                        'required',
                        'maxlength' => 255,
                        'pattern' => '^[\s\_\-\.A-zÑñ]{1,255}$',
                        'data-error' => 'Please enter a valid username! Valid symbols: "_", ".","-"',
                        'placeholder' => 'Enter your username...',
                    ]) !!}
                    <div class="help-block with-errors">{{ $errors->has('username') ? $errors->first('username') : '' }}</div>
                </div>

                <div class="form-group has-feedback col-md-12{{ $errors->has('email') ? ' has-error has-danger' : '' }}">
                    {!! Form::label('email', 'E-mail Address', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), [
                        'class' => 'form-control',
                        'required',
                        'maxlength' => 255,
                        'minlength' => 8,
                        'data-error' => 'Please enter a valid e-mail address!',
                        'placeholder' => 'Enter your e-mail address...',
                    ]) !!}
                    <div class="help-block with-errors">{{ $errors->has('email') ? $errors->first('email') : '' }}</div>
                </div>

                <div class="form-group has-feedback col-md-12{{ $errors->has('email') ? ' has-error has-danger' : '' }}">
                    {!! Form::label('role', 'Role', ['class' => 'control-label']) !!}
                    <select name="role" class="form-control" data-error="Please select a role on the list!" required>
                        <option value="" selected>Select a role...</option>
                        <option value="admin">Administrator</option>
                        <option value="moderator">Moderator</option>
                    </select>
                    <div class="help-block with-errors">{{ $errors->has('email') ? $errors->first('email') : '' }}</div>
                </div>

                <div class="form-group has-feedback col-md-12{{ $errors->has('password') ? ' has-error has-danger' : '' }}">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', [
                        'class' => 'form-control',
                        'required',
                        'minlength' => 8,
                        'data-error' => 'Minimum of 8 characters!',
                        'placeholder' => 'Enter a password...',
                    ]) !!}
                    <div class="help-block with-errors">{{ $errors->has('password') ? $errors->first('password') : '' }}</div>
                </div>

                <div class="form-group has-feedback col-md-12{{ $errors->has('password_confirm') ? ' has-error has-danger' : '' }}">
                    {!! Form::label('password_confirm', 'Confirm Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password_confirm', [
                        'class' => 'form-control',
                        'required',
                        'data-match' => '[name="password"]',
                        'data-error' => 'Please confirm the password!',
                        'placeholder' => 'Enter a password confirmation...',
                    ]) !!}
                    <div class="help-block with-errors">{{ $errors->has('password_confirm') ? $errors->first('password_confirm') : '' }}</div>
                </div>

                <div class="form-group col-md-12">
                    {!! Form::button('Register', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                    {!! Html::linkRoute('users.index', 'Cancel', null, ['class' => 'btn btn-default']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
