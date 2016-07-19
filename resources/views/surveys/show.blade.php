@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
            <form action="surveys" method="get" data-toggle="validator" role="form">
                <div class="col-sm-9">
                    <h1>{{ $survey->title }}</h1>
                    <p class="text-justify">{{ $survey->desc }}</p>
                    
                    @foreach($survey->options as $option)
                        <div class="col-sm-12">
                            <div class="form-group has-feedback col-md-3" data-toggle="buttons">
                                <label class="btn btn-info btn-block" for="xx">
                                <input name="xx" type="radio" value="{{ $option->id }}" data-error="Select an option." required>{{ $option->answer }}</label>
                            </div>
                            <div class="row col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="{{ count($option->students) }}" aria-valuemin="0" aria-valuemax="{{ $totalvote }}" style="width:{{ $votes[$option->id] }}%">10%</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                    <!--div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" style="width: 10%">10%
                                <span class="sr-only">35% Complete (success)</span>
                            </div>
                            <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 40%">40%
                                <span class="sr-only">20% Complete (warning)</span>
                            </div>
                            <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: 50%">50%
                                <span class="sr-only">10% Complete (danger)</span>
                            </div>
                        </div>
                    </div-->

                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Details</h3>
                        </div>
                        <div class="panel-body">
                            <dl class="col-sm-12">
                                <dt>Author</dt>
                                <dd>Juan Dela Cruz</dd>
                                <dt>Posted on</dt>
                                <dd>Mon Jun 15, 2016</dd>
                                <dt>Expire on</dt>
                                <dd>Sat Jul 6, 2016</dd>
                            </dl>
                            <div class="form-group has-feedback col-md-12">
                                <label for="studID">Student ID:</label>
                                <input type="text" class="form-control" name="studID" placeholder="xxxxxxx" maxlength="7" data-error="Invalid student ID." pattern="^[0-9]{7,7}$" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Vote</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection