@extends('layouts.app')

@section('content')

    <div class="container">

        @if (!Auth::guest())
        	<div class="row">
        		<div class="col-md-8 col-md-offset-2">
        			@yield('h-c')
        		</div>
        	</div>
        @endif
        @include('partials._modal_activity')
        <div class="row">
            <div class="col-md-8 col-md-offset-2 activities"></div>
            <div class="col-md-8 col-md-offset-2 text-center more-activities"></div>
        </div>
    </div>
@endsection