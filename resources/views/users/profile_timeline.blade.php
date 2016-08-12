@extends('layouts.profile')

@section('p-c')
    @if (Auth::user()->id == $user->id)
        @include('partials._panel_idea')
    @endif
@endsection

@section('styles')
    @include('partials._style_profile')
    @include('partials._style_c')
    @include('partials._style_a')
@endsection

@section('scripts')
    @include('partials._script_profile')
    @include('partials._script_c')
    @include('partials._script_a')
@endsection