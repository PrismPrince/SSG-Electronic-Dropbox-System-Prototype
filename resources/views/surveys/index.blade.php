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
                    <h1 style="margin-top:0">{{ count($surveys) == 0 ? 'No Survey' : 'Surveys' }}</h1>
                </div>
                <div class="col-sm-2">
                    {!! Html::linkRoute('surveys.create', 'New Survey', [], ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="{{  Route::is('surveys.index') ? 'active' : '' }}" role="presentation">
                    <a href="{{ route('surveys.index') }}" role="tab" data-toggel="tab" aria-controls="surveys">All Surveys <span class="badge">{{ $count['all'] }}</span></a>
                </li>
                <li class="{{  Route::is('surveys.active') ? 'active' : '' }}" role="presentation">
                    <a href="{{ route('surveys.active') }}" role="tab" data-toggel="tab" aria-controls="surveys">Active Surveys <span class="badge">{{ $count['active'] }}</span></a>
                </li>
                <li class="{{  Route::is('surveys.inactive') ? 'active' : '' }}" role="presentation">
                    <a href="{{ route('surveys.inactive') }}" role="tab" data-toggel="tab" aria-controls="surveys">Inactive Surveys <span class="badge">{{ $count['inactive'] }}</span></a>
                </li>
                <li class="{{  Route::is('surveys.expired') ? 'active' : '' }}" role="presentation">
                    <a href="{{ route('surveys.expired') }}" role="tab" data-toggel="tab" aria-controls="surveys">Expired Surveys <span class="badge">{{ $count['expired'] }}</span></a>
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
                                    <th class="text-center">Options</th>
                                    <th class="text-center">Votes</th>
                                    <th class="text-center">Start</th>
                                    <th class="text-center">End</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Created at</th>
                                    <th class="text-center">Updated at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($surveys as $survey)
                                    <tr>
                                        <td>{{ substr($survey->title, 0, 22) }}{{ strlen($survey->title) > 22 ? '...' : '' }}</td>
                                        <td>{{ $survey->user->fname . ' ' . $survey->user->lname }}</td>
                                        <td>{{ substr($survey->desc, 0, 47) }}{{ strlen($survey->desc) > 47 ? '...' : '' }}</td>
                                        <td>{{ count($survey->options) }}</td>
                                        <td>{{ $votes[$survey->id] }}</td>
                                        <td>{{ $carbon->toFormattedDateString($survey->start) }}</td>
                                        <td>{{ $carbon->toFormattedDateString($survey->end) }}</td>
                                        <td>{{ ucfirst($survey->status) }}</td>
                                        <td>{{ $carbon->toFormattedDateString($survey->created_at) }}</td>
                                        <td>{{ $carbon->toFormattedDateString($survey->updated_at) }}</td>
                                        <td class="text-center">
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['surveys.destroy', $survey->id],
                                                'class' => 'form-horizontal'
                                            ]) !!}
                                            <a href="{{ url('surveys/' . $survey->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            @if($survey->user_id == Auth::user()->id)
                                            <a href="{{ url('surveys/' . $survey->id . '/edit') }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                                            @endif
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-sm-12 text-center">
                            {!! $surveys->links() !!}
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