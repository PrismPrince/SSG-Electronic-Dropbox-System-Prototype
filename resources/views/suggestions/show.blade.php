@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials._alert')
            </div>
            <div class="col-sm-7 col-md-offset-1">
                <h1>{{ $suggestion->title }}</h1>
                <p class="text-justify">{!! str_replace("\r", "<br>", htmlentities(preg_replace('/(\r\n\r\n\r\n)+|(\r\r\r)+|(\n\n\n)+/', "\r\r", $suggestion->message))) !!}</p>
            </div>
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Details</h3>
                    </div>
                    <div class="panel-body">
                        <dl class="col-sm-12">
                            <dt>Student</dt>
                            <dd>{{ $suggestion->student->fname . ' ' . ($suggestion->student->mname == '' ? '' : $suggestion->student->mname . ' ') . $suggestion->student->lname }}</dd>
                            <dt>Suggested</dt>
                            <dd>{{ $carbon->parse($suggestion->created_at)->diffForHumans() }}</dd>
                        </dl>
                        <div class="col-md-12">
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['suggestions.destroy', $suggestion->id],
                            ]) !!}
                                {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection