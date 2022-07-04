<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'en' ? 'ltr' :'rtl' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="robots" content="noindex" />
    <link href="{{ asset('admin/global_assets/css/icons/icomoon/styles.min.css') }}"
          rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <!-- Global stylesheets -->
    @if(app()->getLocale() === 'en')
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900"
              rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/assets/en/css/all.min.css') }}" rel="stylesheet"
              type="text/css">
    @else
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,300,100,500,700,900"
              rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    @endif
    <link href="{{ asset('admin/assets/css/custom.css') }}" rel="stylesheet" type="text/css">
    @stack('styles')
</head>

<body>


<div class="page-content">
    <x-sidebar :modules="$sidebar"/>
    <!-- Main content -->
    <div class="content-wrapper">
    @include('dashboard.layouts.components.toolbar')
    <!-- Inner content -->
        <div class="content-inner">
            <!-- Page header -->
            <div class="page-header">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4>
                            @yield('title')
                        </h4>
                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i
                                class="icon-more"></i></a>
                    </div>
                    <div class="header-elements d-none">
                        <div class="d-flex justify-content-center">
                            @yield('actions')
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page header -->
            <!-- Content area -->
            <div class="content pt-0">
                @yield('content')
            </div>
            <!-- /content area -->
        </div>
        <!-- /inner content -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->

<!-- Core JS files -->
@include('sweetalert::alert')

<!-- Core JS files -->
<script src="{{ asset('admin/global_assets/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<script src="//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- /core JS files -->
<script>
    $('.summernote').summernote({
        direction: 'ltr',
        lang: 'ar-AR'
    });
    $(document).ready(function () {
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}});
    });
</script>
@stack('scripts')
</body>
</html>
