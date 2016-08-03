@extends('layouts.profile')

@section('p-c')
    @include('partials._panel_idea')
@endsection

@section('p-con')
    @include('partials._panel_activities')
@endsection

@section('paginator')
<nav aria-label="paginator">
    <ul class="pager">
        @if ($activities->previousPageUrl())
            <li><a href="{{ $activities->previousPageUrl() }}">Previous</a></li>
        @endif
        @if ($activities->nextPageUrl())
            <li><a href="{{ $activities->nextPageUrl() }}">Next</a></li>
        @endif
    </ul>
</nav>
@endsection

@section('styles')
    @include('partials._style_profile')
    @include('partials._style_a')
    @include('partials._style_c')
@endsection

@section('scripts')
    @include('partials._script_a')
    @include('partials._script_c')
@endsection