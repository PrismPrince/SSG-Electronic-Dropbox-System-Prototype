@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'class' => 'form', 'role' => 'form', 'data-toggle' => 'validator']) !!}
                <div class="col-sm-7 col-sm-offset-1">
                    <div class="form-group has-feedback col-md-12{{ $errors->has('title') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                        {!! Form::text('title', old('title'), [
                            'class' => 'form-control input-lg',
                            'required',
                            'maxlength' => 255,
                            'pattern' => '^[\s\_\-\:\.\,\?\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$',
                            'data-error' => 'Invalid input!',
                            'placeholder' => 'Enter post title...',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('title') ? $errors->first('title') : '' }}</div>
                    </div>

                    <div class="form-group has-feedback col-md-12{{ $errors->has('desc') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('desc', 'Description', ['class' => 'control-label']) !!}
                        {!! Form::textarea('desc', old('desc'), [
                            'class' => 'form-control',
                            'required',
                            'rows' => '10',
                            'data-error' => 'Invalid input!',
                            'placeholder' => 'Enter post description...',
                        ]) !!}
                        <div class="help-block with-errors">{{ $errors->has('desc') ? $errors->first('desc') : '' }}</div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Details</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <dl class="col-sm-12">
                                    <dt>Author</dt>
                                    <dd>{{ $post->user->fname . ' ' . $post->user->lname }}</dd>
                                    <dt>Posted</dt>
                                    <dd>{{ $carbon->parse($post->created_at)->diffForHumans() }}</dd>
                                    <dt>Updated</dt>
                                    <dd>{{ $carbon->parse($post->updated_at)->diffForHumans() }}</dd>
                                </dl>
                            </div>
                            @if($post->user->id == Auth::user()->id)
                                <div class="form-group col-lg-6">
                                    {!! Html::linkRoute('posts.show', 'Cancel', [$post->id], ['class' => 'btn btn-default btn-block']) !!}
                                </div>
                                <div class="form-group col-lg-6">
                                    {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-success btn-block']) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection