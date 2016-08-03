@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials._alert')
            </div>

<div class="panel panel-info">
    <div class="panel-body clearfix">
        <h5 class="a-h col-xs-11">
            <b class="a-h-n">{{ $survey->user->fname . ' ' . $survey->user->lname }}</b>
            conducted a survey about
            <a href="#" class="a-h-l">{{ $survey->title }}</a>
            <br><small class="a-h-d a-tt">{{ $survey->created_at }}</small>
        </h5>
        <div class="col-xs-1 text-right">
            @if(Auth::guest())
                {{ '' }}
            @elseif($survey->user->id == Auth::user()->id)
                <a class="a-o" data-placement="bottom" data-content='
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['surveys.destroy', $survey->id],
                        'class' => 'form-horizontal'
                    ]) !!}
                    <a href="{{ url('surveys/' . $survey->id . '/edit') }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                '><span class="caret"></span></a>
            @endif
        </div>
        <p class="col-xs-12">{{ str_limit($survey->desc, 500) }}</p><hr>
        <div class="col-xs-12 a-f">
            <a href="{{ url('surveys/' . $survey->id) }}" class="btn btn-info btn-xs">Read More</a>
            <span class="a-tt" title="{{ count($survey->options) . ' ' . str_plural('option', count($survey->options)) }}">
                <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> {{ count($survey->options) }}
            </span>
            <span class="label label-{{ $survey->status == 'active' ? 'success' : ($survey->status == 'pending' ? 'default' : 'danger') }}">{{ ucfirst($survey->status) }}</span>
            <span class="a-f-{{ $survey->status == 'active' ? 'a' : ($survey->status == 'pending' ? 'p' : 'e') }} a-tt">{{ $survey->status == 'pending' ? $survey->start : ($survey->status == 'pending' ? $survey->end : $survey->end) }}</span>
        </div>
    </div>
</div>


            {!! Form::open([
                'data-toggle' => 'validator',
                'role' => 'form',
                'url' => 'vote/' . $survey->id,
            ]) !!}
                <div class="col-md-9">
                    <h1>{{ $survey->title }}</h1>
                    <p class="text-justify">{{ $survey->desc }}</p>
                    
                    <h3>{{ ($survey->type == 'checkbox') ? 'Select one or more' : 'Select one only' }}</h3>

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
                                    <input name="options[]" type="{{ $survey->type }}" value="{{ $option->id }}" data-error="Choose an option!." style="position:absolute;clip:rect(0,0,0,0);pointer-events:none">{{ $option->answer }}</label>
                                </div>
                                <div class="row col-sm-9">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="{{ $votes[$option->id] }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $votes[$option->id] }}%">{{ round($votes[$option->id], 2) }}%</div>
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
                                        <dd>{{ $survey->start }} <small>({{ $survey->start }})</small></dd>
                                        <dt>Ends</dt>
                                        <dd>{{ $survey->end }} <small>({{ $survey->end }})</small></dd>
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