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
                    <h1 style="margin-top:0">{{ count($users) == 0 ? 'No Users' : 'Users' }}</h1>
                </div>
                <div class="col-sm-2">
                    {!! Html::linkRoute('users.create', 'New User', [], ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="{{  Route::is('users.index') ? 'active' : '' }}" role="presentation">
                    <a href="{{ route('users.index') }}" role="tab" data-toggel="tab" aria-controls="users">All Users</a>
                </li>
                <li class="{{ Route::is('users.admin') ? 'active' : '' }}" role="presentation">
                    <a href="{{ route('users.admin') }}" role="tab" data-toggel="tab" aria-controls="otherPosts">Admin Users</a>
                </li>
                <li class="{{ Route::is('users.moderator') ? 'active' : '' }}" role="presentation">
                    <a href="{{ route('users.moderator') }}" role="tab" data-toggel="tab" aria-controls="myPosts">Moderator Users</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">E-mail Address</th>
                                    <th class="text-center">Created at</th>
                                    <th class="text-center">Updated at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->fname . ' ' . ($user->mname == '' ? '' : $user->mname . ' ') . $user->lname }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td class="text-center"><span class="label label-{{ $user->role == 'admin' ? 'danger' : 'info' }}">{{ ucfirst($user->role) }}</span></td>
                                        <td class="text-center">
                                            <span class="label label-{{ $user->status == 'active' ? 'success' : 'default' }}">
                                                {{ ucfirst($user->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $carbon->parse($user->created_at)->toFormattedDateString() }}</td>
                                        <td>{{ $carbon->parse($user->updated_at)->toFormattedDateString() }}</td>
                                        <td class="text-center">
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['users.destroy', $user->id],
                                                'class' => 'form-horizontal'
                                            ]) !!}
                                            <a href="{{ url('users/' . $user->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-sm-12 text-center">
                            {!! $users->links() !!}
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