<header id="header-waypoint-sticky" class="header-main header-mobile-menu with-absolute-navbar">

    <div class="header-outer clearfix">

        <div class="header-inner">

            <div class="row shrink-auto-lg gap-0 align-items-center">

                <div class="col-5 col-shrink">
                    <div class="col-inner">
                        <div class="main-logo">
                            <a href="index.html"><img src="{{ url('/') }}/frontend/images/logo.png" alt="images" /></a>
                        </div>
                    </div>
                </div>

                <div class="col-7 col-shrink order-last-lg">
                    <div class="col-inner">
                        <ul class="nav-mini-right">
                            @guest
                            <li class="d-none d-sm-block">
                                <a href="#loginFormTabInModal-register" data-toggle="modal" data-target="#loginFormTabInModal" data-backdrop="static" data-keyboard="false">
                                    <span class="icon-font"><i class="icon-user-follow"></i></span> Register
                                </a>
                            </li>
                            <li class="d-none d-sm-block">
                                <a href="#loginFormTabInModal-login" data-toggle="modal" data-target="#loginFormTabInModal" data-backdrop="static" data-keyboard="false">
                                    <span class="icon-font"><i class="icon-login"></i></span> Login
                                </a>
                            </li>
                            @endguest
                            <li class="d-block d-sm-none">
                                @guest
                                <a href="#loginFormTabInModal-login" data-toggle="modal" data-target="#loginFormTabInModal" data-backdrop="static" data-keyboard="false">
                                    Login
                                </a> /
                                <a href="#loginFormTabInModal-register" data-toggle="modal" data-target="#loginFormTabInModal" data-backdrop="static" data-keyboard="false">
                                    Register
                                </a>
                                @endguest
                            </li>
                            <li>
                                <button class="btn btn-toggle collapsed" data-toggle="collapse" data-target="#mobileMenu"></button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-auto">

                    <div class="navbar-wrapper">

                        <div class="navbar navbar-expand-lg">

                            <div id="mobileMenu" class="collapse navbar-collapse">

                                <nav class="main-nav-menu main-menu-nav navbar-arrow">

                                    <ul class="main-nav">
                                        <li>
                                            <a href="{{url('/')}}">{{__('Home')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{url('tours')}}">{{__('Tours')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{url('blog')}}">{{__('Blog')}}</a>
                                        </li>

                                        <li><a href="{{route('contact_us')}}">{{__('Contact us')}}</a></li>
                                        @auth
                                        <li>
                                            <a href="#" id="logout">
                                                <span class="icon-font"><i class="icon-logout"></i></span> {{__('Logout')}}
                                            </a>
                                        </li>
                                        @endauth
                                    </ul>

                                </nav><!--/.nav-collapse -->

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>
