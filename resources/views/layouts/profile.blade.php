@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                @include('partials._alert')
            </div>

            @include('partials._profile_head')

            <div class="row">
                <div class="col-sm-12">
                    
                    @include('partials._profile_aside')

                    <div class="col-sm-8">
                        @yield('p-c')
                        @yield('p-con')
                        @yield('paginator')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection