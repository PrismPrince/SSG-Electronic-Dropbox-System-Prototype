@extends('layouts.articles')

@section('title', 'SSG Survey System')

@section('h-t', str_plural('Survey', count($surveys)))

@section('b-c')
    @foreach($surveys as $survey)
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
                    <span class="a-tt" title="{{ $votes[$survey->id] . ' ' . str_plural('voter', $votes[$survey->id]) }}">
                        <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> {{ $votes[$survey->id] }}
                    </span>
                    <span class="a-tt" title="{{ count($survey->options) . ' ' . str_plural('option', count($survey->options)) }}">
                        <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> {{ count($survey->options) }}
                    </span>
                    <span class="label label-{{ $survey->status == 'active' ? 'success' : ($survey->status == 'pending' ? 'default' : 'danger') }}">{{ ucfirst($survey->status) }}</span>
                    <span class="a-f-{{ $survey->status == 'active' ? 'a' : ($survey->status == 'pending' ? 'p' : 'e') }} a-tt">{{ $survey->status == 'pending' ? $survey->start : ($survey->status == 'pending' ? $survey->end : $survey->end) }}</span>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('pager')
<nav aria-label="paginator">
    <ul class="pager">
        @if ($surveys->previousPageUrl())
            <li><a href="{{ $surveys->previousPageUrl() }}">Previous</a></li>
        @endif
        @if ($surveys->nextPageUrl())
            <li><a href="{{ $surveys->nextPageUrl() }}">Next</a></li>
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