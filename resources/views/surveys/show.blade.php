@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials._alert')
            </div>
            {!! Form::open([
                'data-toggle' => 'validator',
                'role' => 'form',
                'url' => 'vote/' . $survey->id,
            ]) !!}
                <div class="col-md-9">
                    <h1>{{ $survey->title }}</h1>
                    <p class="text-justify">{{ $survey->desc }}</p>
                    
                    <h3>Select One</h3>

                    <div class="has-feedback{{ $errors->has('options[]') ? ' has-error has-danger' : '' }}">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <div class="help-block with-errors">{{ $errors->has('options[]') ? $errors->first('options[]') : '' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" data-toggle="buttons">
                        @foreach($survey->options as $option)
                            <div class="col-md-12 clearfix form-group">
                                <div class="col-sm-3">
                                    <label class="btn btn-info btn-block" for="option">
                                    <input name="options[]" type="{{ $survey->type }}" value="{{ $option->id }}" data-error="Choose an option!." style="position:absolute;clip:rect(0,0,0,0);pointer-events:none" {{-- ($survey->options->first() == $option) && $survey->type != 'checkbox' ? 'required' : '' --}}>{{ $option->answer }}</label>
                                </div>
                                <div class="row col-sm-9">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="{{ $votes[$option->id] }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $votes[$option->id] }}%">{{ $votes[$option->id] }}%</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Details</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <dl>
                                        <dt>Author</dt>
                                        <dd>{{ $survey->user->fname . ' ' . $survey->user->lname }}</dd>
                                        <dt>Starts</dt>
                                        <dd>{{ $carbon->parse($survey->start)->toFormattedDateString() }} <small>({{ $carbon->parse($survey->start)->diffForHumans() }})</small></dd>
                                        <dt>Ends</dt>
                                        <dd>{{ $carbon->parse($survey->end)->toFormattedDateString() }} <small>({{ $carbon->parse($survey->end)->diffForHumans($carbon->copy()->now()) }})</small></dd>
                                    </dl>
                                </div>
                            </div>
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
                                    'placeholder' => 'First name...',
                                ]) !!}
                                <div class="help-block with-errors">{{ $errors->has('fname') ? $errors->first('fname') : '' }}</div>
                            </div>
                            <div class="form-group has-feedback col-md-12{{ $errors->has('lname') ? ' has-error has-danger' : '' }}">
                                {!! Form::label('lname', 'Last Name', ['class' => 'control-label']) !!}
                                {!! Form::text('lname', old('lname'), [
                                    'class' => 'form-control',
                                    'required',
                                    'maxlength' => 255,
                                    'pattern' => '^[\s\-\.A-zÑñ]{1,255}$',
                                    'data-error' => 'Please enter a valid name!',
                                    'placeholder' => 'Last name...',
                                ]) !!}
                                <div class="help-block with-errors">{{ $errors->has('lname') ? $errors->first('lname') : '' }}</div>
                            </div>

                            <div class="form-group col-md-12">
                                {!! Form::button('Vote', ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) !!}
                            </div>
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection