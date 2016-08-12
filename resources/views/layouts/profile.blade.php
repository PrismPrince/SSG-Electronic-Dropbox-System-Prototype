@extends('layouts.app')

@section('title', 'SSG Survey System')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                @include('partials._alert')
            </div>

            @include('partials._profile_head')

            <div id="p-c-a" class="row">
                <div class="col-sm-12">
                    
                    @include('partials._profile_aside')
                    <div class="col-sm-8">
                        <div class="">
                            @yield('p-c')
                        </div>
                        @include('partials._modal_activity')
                        <div class="activities"></div>
                        <div class="text-center more-activities"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection