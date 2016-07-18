@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
        @include('partials._alert')
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form', 'data-toggle' => 'validator']) !!}
                <div class="col-sm-7 col-md-offset-1">

                    <div class="form-group has-feedback col-md-12{{ $errors->has('fname') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('fname', 'First Name', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
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
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('mname') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('mname', 'Middle Name', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('mname', old('mname'), [
                                'class' => 'form-control',
                                'maxlength' => 255,
                                'pattern' => '^[\s\-\.A-zÑñ]{1,255}$',
                                'data-error' => 'Please enter a valid name!',
                                'placeholder' => 'Enter your middle name...',
                            ]) !!}
                            <div class="help-block with-errors">{{ $errors->has('mname') ? $errors->first('mname') : '' }}</div>
                        </div>
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('lname') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('lname', 'Last Name', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
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
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('username') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('username', 'Username', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
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
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('email') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('email', 'E-mail Address', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
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

                    <div class="form-group has-feedback col-md-12{{ $errors->has('role') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('role', 'Role', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            <select name="role" class="form-control" data-error="Please select a role on the list!" required>
                                <option value="" {{ $user->role == '' ? '' : '' }}>Select a role...</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrator</option>
                                <option value="moderator" {{ $user->role == 'moderator' ? 'selected' : '' }}>Moderator</option>
                            </select>
                            <div class="help-block with-errors">{{ $errors->has('role') ? $errors->first('role') : '' }}</div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Details</h3>
                        </div>
                        <div class="panel-body">
                            <dl class="col-sm-12">
                                <dt>Author</dt>
                                <dd>{{ $user->ststus }}</dd>
                                <dt>Joined</dt>
                                <dd>{{ $carbon->parse($user->created_at)->diffForHumans() }}</dd>
                                <dt>Updated</dt>
                                <dd>{{ $carbon->parse($user->updated_at)->diffForHumans() }}</dd>
                            </dl>
                            <div class="col-md-6">
                                {!! Html::linkRoute('users.show', 'Cancel', [$user->id], ['class' => 'btn btn-default btn-block']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-success btn-block']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection