@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container-fluid">
        <div class="col-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Navigation</h3></div>
                <ul class="list-group">
                    <li class="list-group-item">Home</li>
                    <li class="list-group-item">Posts</li>
                    <li class="list-group-item">Surveys</li>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-sm-12">
                    @include('partials._alert')
                </div>
                <div class="col-sm-10">
                    <h1 style="margin-top:0">{{ count($posts) == 0 ? 'No Post' : 'Posts' }}</h1>
                </div>
                <div class="col-sm-2">
                    {!! Html::linkRoute('posts.create', 'New Post', [], ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="{{  Route::is('posts.index') ? 'active' : '' }}" role="presentation">
                    <a href="{{ route('posts.index') }}" role="tab" data-toggel="tab" aria-controls="posts">All Posts <span class="badge">{{ $count['all'] }}</span></a>
                </li>
                <li class="{{ Route::is('posts.me') ? 'active' : '' }}" role="presentation">
                    <a href="{{ route('posts.me') }}" role="tab" data-toggel="tab" aria-controls="myPosts">My Posts <span class="badge">{{ $count['me'] }}</span></a>
                </li>
                <li class="{{ Route::is('posts.other') ? 'active' : '' }}" role="presentation">
                    <a href="{{ route('posts.other') }}" role="tab" data-toggel="tab" aria-controls="otherPosts">Other Posts <span class="badge">{{ $count['other'] }}</span></a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Created at</th>
                                    <th class="text-center">Updated at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ substr($post->title, 0, 32) }}{{ strlen($post->title) > 32 ? '...' : '' }}</td>
                                        <td>{{ $post->user->fname . ' ' . ($post->user->mname == '' ? '' : $post->user->mname . ' ') . $post->user->lname }}</td>
                                        <td>{{ substr($post->desc, 0, 67) }}{{ strlen($post->desc) > 67 ? '...' : '' }}</td>
                                        <td>{{ $carbon->toFormattedDateString($post->created_at) }}</td>
                                        <td>{{ $carbon->toFormattedDateString($post->updated_at) }}</td>
                                        <td class="text-center">
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['posts.destroy', $post->id],
                                                'class' => 'form-horizontal'
                                            ]) !!}
                                            <a href="{{ url('posts/' . $post->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            @if($post->user->id == Auth::user()->id)
                                            <a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                                            @endif
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-sm-12 text-center">
                            {!! $posts->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style type="text/css">
        ul.pagination {
            margin-top: 0;
        }
    </style>
@stop