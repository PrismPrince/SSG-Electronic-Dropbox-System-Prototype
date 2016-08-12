@extends('layouts.articles')

@section('title', 'SSG Survey System')

@section('h-c')
    @if (!Auth::guest())
        @include('partials._panel_idea')
    @endif
@endsection

@section('styles')
    @include('partials._style_a')
    @include('partials._style_c')
@endsection

@section('scripts')
    @include('partials._script_a')
    @include('partials._script_c')
@endsection