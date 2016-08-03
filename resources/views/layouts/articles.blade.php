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

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @yield('b-c')
                @yield('pager')
            </div>
        </div>
    </div>
@endsection