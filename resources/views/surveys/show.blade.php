@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open([
                'data-toggle' => 'validator',
                'role' => 'form',
                'url' => 'surveys',
            ]) !!}
                <div class="col-sm-9">
                    <h1>{{ $survey->title }}</h1>
                    <p class="text-justify">{{ $survey->desc }}</p>
                    
                    <h3>Select One</h3>

                    <div class="has-feedback{{ $errors->has('option') ? ' has-error has-danger' : '' }}">
                        @foreach($survey->options as $option)
                            <div class="col-sm-12 form-group">
                                <div class="col-md-3" data-toggle="buttons">
                                    <label class="btn btn-info btn-block" for="option">
                                    <input name="option[]" type="radio" value="{{ $option->id }}" data-error="Select an option." required>{{ $option->answer }}</label>
                                </div>
                                <div class="row col-md-9">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="{{ $votes[$option->id] }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $votes[$option->id] }}%">{{ $votes[$option->id] }}% votes</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="help-block with-errors">{{ $errors->has('option[]') ? $errors->first('option[]') : '' }}</div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Details</h3>
                        </div>
                        <div class="panel-body">
                            <dl class="col-sm-12">
                                <dt>Author</dt>
                                <dd>{{ $survey->user->fname . ' ' . $survey->user->lname }}</dd>
                                <dt>Starts</dt>
                                <dd>{{ $carbon->parse($survey->start)->toFormattedDateString() }} <small>({{ $carbon->parse($survey->start)->diffForHumans() }})</small></dd>
                                <dt>Ends</dt>
                                <dd>{{ $carbon->parse($survey->end)->toFormattedDateString() }} <small>({{ $carbon->parse($survey->end)->diffForHumans($carbon->copy()->now()) }})</small></dd>
                            </dl>
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