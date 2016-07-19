@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    {!! Form::open([
                        'class' => 'form-horizontal',
                        'data-toggle' => 'validator',
                        'role' => 'form',
                        'url' => 'login',
                    ]) !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'E-mail Address', ['class' => 'control-label col-md-4']) !!}
                            <div class="col-md-6">
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
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Password', ['class' => 'control-label col-md-4']) !!}

                            <div class="col-md-6">
                                {!! Form::password('password', [
                                    'class' => 'form-control',
                                    'required',
                                    'minlength' => 8,
                                    'data-error' => 'Minimum of 8 characters!',
                                    'placeholder' => 'Enter a password...',
                                ]) !!}
                                <div class="help-block with-errors">{{ $errors->has('password') ? $errors->first('password') : '' }}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('remember', null) !!} Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::button('Login', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                                {!! Html::link('password/reset', 'Forgot Your Password?', ['class' => 'btn btn-link']) !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
