@props(['modules'=>[]])
<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">
    <!-- App logo and controls -->
    <div class="navbar navbar-dark bg-dark-100 navbar-static border-0">
        <div class="navbar-brand flex-fill wmin-0">
            <a href="{{ route('dashboard.home') }}" class="d-inline-block">
                <img src="{{ asset('admin/logo-light.png') }}"
                     class="sidebar-resize-hide" alt="">
                <img src="{{ asset('admin/global_assets/images/logo_icon_light.png') }}"
                     class="sidebar-resize-show" alt="">
            </a>
        </div>

        <ul class="navbar-nav align-self-center ml-auto sidebar-resize-hide">
            <li class="nav-item dropdown">
                <button type="button"
                        class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                    <i class="icon-transmission"></i>
                </button>

                <button type="button"
                        class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                    <i class="icon-cross2"></i>
                </button>
            </li>
        </ul>
    </div>
    <!-- /app logo and controls -->
    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-section sidebar-section-body user-menu-vertical text-center">
            <div class="sidebar-resize-hide position-relative mt-2">
                <div class="dropdown">
                    <div class="cursor-pointer" data-toggle="dropdown">
                        <h6 class="font-weight-semibold dropdown-toggle mb-0">
                            {{ auth()->user() ->name }}
                        </h6>
                        <span class="d-block text-muted">{{ auth()->user()->email }}</span>
                    </div>

                    <div class="dropdown-menu w-100">
                        <a href="{{ route('dashboard.core.administration.profile') }}"
                           class="dropdown-item">
                            <i class="icon-cog5"></i>
                            {{ __('Account settings') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('dashboard.logout') }}" class="dropdown-item">
                            <i class="icon-switch2"></i>
                            {{ __('Logout') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->
        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                @foreach($modules as $module)
                    <x-sidebar.module
                        :name="$module['name']"
                        :icon="$module['icon']"
                        :items="$module['items']"
                    />
                @endforeach
            </ul>
        </div>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar content -->
</div>
<!-- /main sidebar -->
