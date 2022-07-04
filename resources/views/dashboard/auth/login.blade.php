<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - {{ __('Administration Login') }}</title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900"
          rel="stylesheet"
          type="text/css">
    <link href="{{ asset('admin/global_assets/css/icons/icomoon/styles.min.css') }}"
          rel="stylesheet"
          type="text/css">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('admin/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/components.min.css') }}" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('admin/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/custom.css') }}" rel="stylesheet" type="text/css">
    @stack('styles')
</head>


<body class="bg-slate-800">
<!-- Page content -->
<div class="page-content">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">
            <!-- Login card -->
            <form class="login-form" action="{{ route('dashboard.login') }}" method="post">
                @csrf
                <div class="card cardbac mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <h5 class="mb-0">{{ __('Administration Login') }}</h5>
                            @error('email')
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                            @enderror
                        </div>
                        <div
                            class="form-group @error('email') has-warning @enderror form-group-feedback form-group-feedback-left">
                            <input type="email" name="email" class="form-control"
                                   placeholder="Email">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" name="password" class="form-control"
                                   placeholder="Password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <div class="form-check mb-0">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-input-styled"
                                           checked data-fouc>
                                    Remember
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Sign in <i
                                    class="icon-circle-left2 ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /login card -->
        </div>
        <!-- /content area -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('admin/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/demo_pages/login.js') }}"></script>
</body>
</html>
