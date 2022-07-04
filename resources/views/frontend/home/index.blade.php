@extends('frontend.layouts.app')

@section('content')
    <div class="main-wrapper scrollspy-container">

        @include('frontend.partials.tour-search')

        @include('frontend.partials.container')

        @include('frontend.partials.client-says')

        @include('frontend.partials.articles')

    </div>

    </div>
@endsection
