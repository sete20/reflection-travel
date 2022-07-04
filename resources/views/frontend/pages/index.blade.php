@extends('frontend.layouts.app')
@section('content')
    <div class="main-wrapper scrollspy-container text-center" style="margin-top: 140px">
        <h1>{{ $page->title }}</h1>
        {!! $page->body !!}
    </div>
@endsection
