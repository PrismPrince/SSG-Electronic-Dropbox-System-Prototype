@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials._alert')
            </div>
            <div class="col-sm-7 col-md-offset-1">
                <h1>{{ $post->title }}</h1>
                <p class="text-justify">{!! str_replace("\r", "<br>", htmlentities(preg_replace('/(\r\n\r\n\r\n)+|(\r\r\r)+|(\n\n\n)+/', "\r\r", $post->desc))) !!}</p>
            </div>
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Details</h3>
                    </div>
                    <div class="panel-body">
                        <dl class="col-sm-12">
                            <dt>Author</dt>
                            <dd>{{ $post->user->fname . ' ' . $post->user->lname }}</dd>
                            <dt>Posted on</dt>
                            <dd>{{ date('D, M j, Y g:i a', strtotime($post->created_at)) }}</dd>
                            <dt>Updated on</dt>
                            <dd>{{ date('D, M j, Y g:i a', strtotime($post->updated_at)) }}</dd>
                        </dl>
                        @if($post->user->id == Auth::user()->id)
                            <div class="col-md-6">
                                {!! Html::linkRoute('posts.edit', 'Edit Post', [$post->id], ['class' => 'btn btn-info btn-block']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['posts.destroy', $post->id],
                                ]) !!}
                                    {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-block']) !!}
                                {!! Form::close() !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection