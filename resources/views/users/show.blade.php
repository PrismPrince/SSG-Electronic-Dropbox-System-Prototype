@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                @include('partials._alert')
            </div>
            <div class="col-sm-7 col-sm-offset-1">
                <dl class="col-sm-12 dl-horizontal">
                    <dt style="margin-top:10px">First Name</dt>
                    <dd><pre class="">{{ $user->fname }}</pre></dd>
                    <dt style="margin-top:10px">Middle Name</dt>
                    <dd><pre class="">{!! ($user->mname == null || $user->mname == '') ? '<span style="color:red">N/A</span>' : $user->mname !!}</pre></dd>
                    <dt style="margin-top:10px">Last Name</dt>
                    <dd><pre class="">{{ $user->lname }}</pre></dd>
                    <dt style="margin-top:10px">Username</dt>
                    <dd><pre class="">{{ $user->username }}</pre></dd>
                    <dt style="margin-top:10px">E-mail Address</dt>
                    <dd><pre class="">{{ $user->email }}</pre></dd>
                    <dt style="margin-top:10px">Role</dt>
                    <dd><pre class="">{{ ucfirst($user->role) }}</pre></dd>
                </dl>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <dl class="col-sm-12">
                                <dt>Status</dt>
                                <dd>{{ ucfirst($user->status) }}</dd>
                                <dt>Joined</dt>
                                <dd>{{ $carbon->parse($user->created_at)->diffForHumans() }}</dd>
                                <dt>Updated</dt>
                                <dd>{{ $carbon->parse($user->updated_at)->diffForHumans() }}</dd>
                            </dl>
                        </div>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['users.destroy', $user->id],
                        ]) !!}
                            <div class="form-group col-lg-6">
                                {!! Html::linkRoute('users.edit', 'Edit User', [$user->id], ['class' => 'btn btn-info btn-block']) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                    {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-block']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection