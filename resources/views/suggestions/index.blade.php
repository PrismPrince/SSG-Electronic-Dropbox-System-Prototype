@extends('layouts.articles')

@section('title', 'SSG Survey System')

@section('h-t', str_plural('Suggestion', count($suggestions)))

@section('b-c')
    @foreach($suggestions as $suggestion)
        <div class="panel panel-info">
            <div class="panel-body">
                <h5 class="a-h col-xs-11">
                    <b class="a-h-n">{{ $suggestion->student->fname . ' ' . $suggestion->student->lname }}</b>
                    suggested about
                    <a href="#" class="a-h-l">{{ $suggestion->title }}</a>
                    <br><small class="a-h-d a-tt">{{ $suggestion->created_at }}</small>
                </h5>
                <div class="col-xs-1 text-right"><a class="a-o" data-placement="bottom" data-content='
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['suggestions.destroy', $suggestion->id],
                        'class' => 'form-horizontal'
                    ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                '><span class="caret"></span></a></div>
                <p class="col-xs-12">{{ str_limit($suggestion->message, 500) }}</p><hr>
                <div class="col-xs-12 a-f">
                    <a href="{{ url('suggestions/' . $suggestion->id) }}" class="btn btn-info btn-xs">Read More</a>

                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('pager')
<nav aria-label="paginator">
    <ul class="pager">
        @if ($suggestions->previousPageUrl())
            <li><a href="{{ $suggestions->previousPageUrl() }}">Previous</a></li>
        @endif
        @if ($suggestions->nextPageUrl())
            <li><a href="{{ $suggestions->nextPageUrl() }}">Next</a></li>
        @endif
    </ul>
</nav>
@endsection

@section('styles')
    @include('partials._style_a')
@endsection

@section('scripts')
    @include('partials._script_a')
@endsection