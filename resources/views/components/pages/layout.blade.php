@props(['title'=>'Layout Page'])
@extends('dashboard.layouts.default')
@section('title',$title)
@push('styles')
    {{ $header ?? '' }}
@endpush
@section('content')
    {{ $slot  }}
@endsection
@push('scripts')
    {{ $footer ?? '' }}
@endpush
