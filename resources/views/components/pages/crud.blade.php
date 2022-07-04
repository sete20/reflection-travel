@props(['name','route','create'=>true,'datatable','parameters'=>[]])
@extends('dashboard.layouts.default')
@section('title',$name)
@push('styles')
@endpush
@section('actions')
    @if($create)
        <a href="{{route("{$route}.create",$parameters)}}"
           class="btn btn-primary">
            <i class="icon-plus2"></i>
            <span>  {{ __('Create') }}</span>
        </a>
    @endif
@endsection
@section('content')
    {{ $header ?? '' }}

    <div class="card">
        <div class="card-body overflow-auto">
            {{$datatable->table(['class'=>'table datatable-ajax'])}}
        </div>
    </div>
    {{ $slot }}
@endsection
@push('scripts')
    <!-- Required datatable js -->
    <script
        src="{{ asset('admin/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    {{--    <script--}}
    {{--        src="{{ asset('admin/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>--}}
    <script
        src="{{ asset('admin/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>

    {{ $datatable->scripts() }}
    <script>
        window.routes = '{{ route($route.'.index') }}/';
    </script>
    <script src="{{ asset('admin/helper.js') }}"></script>
    {{ $footer ?? '' }}
@endpush
