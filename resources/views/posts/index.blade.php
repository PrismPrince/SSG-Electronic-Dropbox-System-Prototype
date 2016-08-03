@extends('layouts.articles')

@section('title', 'SSG Survey System')

@section('h-c')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Create Post</h3>
        </div>
        {!! Form::open([
            'class' => 'form-horizontal',
            'data-toggle' => 'validator',
            'role' => 'form',
            'url' => 'posts',
        ]) !!}
            <div class="panel-body">
                <div class="img col-xs-1">
                    <img src="{{ url('img/pic.jpg') }}" alt="">
                </div>
                <div class="cont col-xs-11">
                    {!! Form::text('title', old('title'), [
                        'class' => 't',
                        'required',
                        'maxlength' => 255,
                        'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$',
                        'data-error' => 'Please enter a valid input!',
                        'placeholder' => 'What\'s on your mind?',
                    ]) !!}
                    {!! Form::textarea('desc', old('desc'), [
                        'class' => 'd',
                        'required',
                        'rows' => 3,
                        'data-error' => 'Please enter a valid input!',
                        'placeholder' => 'Enter post description...',
                    ]) !!}
                    <div class="i-img">
                        {!! Form::file('image', [
                            'class' => 'img-up',
                        ]) !!}
                        {!! Form::button('&times;', ['class' => 'img-dismiss text-center']) !!}
                    </div>
                </div>
            </div>
            <div class="panel-footer clearfix">
                {!! Form::button('Post', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('b-c')
    @foreach($posts as $post)
        <div class="panel panel-info">
            <div class="panel-body">
                <h5 class="a-h col-xs-11">
                    <b class="a-h-n">{{ $post->user->fname . ' ' . $post->user->lname }}</b>
                    posted
                    <a href="#" class="a-h-l">{{ $post->title }}</a>
                    <br><small class="a-h-d a-tt">{{ $post->created_at }}</small>
                </h5>
                <div class="col-xs-1 text-right">
                    @if($post->user->id == Auth::user()->id)
                        <a class="a-o" data-placement="bottom" data-content='
                            {{ Form::open([
                                'method' => 'DELETE',
                                'route' => ['posts.destroy', $post->id],
                                'class' => 'form-horizontal'
                            ]) }}
                            <a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        '><span class="caret"></span></a>
                    @endif
                </div>
                <p class="col-xs-12">{{ str_limit($post->desc, 500) }}</p><hr>
                <div class="col-xs-12 a-f">
                    <a href="{{ url('posts/' . $post->id) }}" class="btn btn-info btn-xs">Read More</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('pager')
<nav aria-label="paginator">
    <ul class="pager">
        @if ($posts->previousPageUrl())
            <li><a href="{{ $posts->previousPageUrl() }}">Previous</a></li>
        @endif
        @if ($posts->nextPageUrl())
            <li><a href="{{ $posts->nextPageUrl() }}">Next</a></li>
        @endif
    </ul>
</nav>
@endsection

@section('styles')
    @include('partials._style_a')
    @include('partials._style_c')
@endsection

@section('scripts')
    @include('partials._script_a')
    @include('partials._script_c')
@endsection