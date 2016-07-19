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
                <div class="col-sm-12">
                    <h1 style="margin-top:0">{{ count($suggestions) == 0 ? 'No Suggestions' : 'Suggestions' }}</h1>
                </div>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="{{  Route::is('suggestions.index') ? 'active' : '' }}" role="presentation">
                    <a href="{{ route('suggestions.index') }}" role="tab" data-toggel="tab" aria-controls="suggestions">All Suggestions <span class="badge">{{ count($suggestions) }}</span></a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover table-striped text-nowrap">
                            <thead  class="bg-primary">
                                <tr>
                                    <th class="text-center">Student ID</th>
                                    <th class="text-center">From</th>
                                    <th class="text-center">To</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Message</th>
                                    <th class="text-center">Suggested at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suggestions as $suggestion)
                                    <tr>
                                        <th class="text-center">{{ $suggestion->student->id }}</th>
                                        <td>{{ $suggestion->student->fname . ' ' . $suggestion->student->lname }}</td>
                                        <td>{{ substr($suggestion->addressed_to, 0, 32) }}{{ strlen($suggestion->addressed_to) > 32 ? '...' : '' }}</td>
                                        <td>{{ substr($suggestion->title, 0, 32) }}{{ strlen($suggestion->title) > 32 ? '...' : '' }}</td>
                                        <td>{{ substr($suggestion->message, 0, 67) }}{{ strlen($suggestion->message) > 67 ? '...' : '' }}</td>
                                        <td>{{ $carbon->toFormattedDateString($suggestion->created_at) }}</td>
                                        <td class="text-center">
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['suggestions.destroy', $suggestion->id],
                                                'class' => 'form-horizontal'
                                            ]) !!}
                                                <a href="{{ url('suggestions/' . $suggestion->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-sm-12 text-center">
                            {!! $suggestions->links() !!}
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