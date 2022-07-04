<footer class="footer-wrapper light scrollspy-footer">

    <div class="footer-top">

        <div class="container">

            <div class="row shrink-auto-md align-items-lg-center gap-10">

                <div class="col-12 col-shrink order-last-md">

                    <div class="col-inner">

                        <div class="footer-dropdowns">

                            <div class="row shrink-auto gap-30 align-items-center">

                                <div class="col-auto">

                                    <div class="col-inner">
                                        @php($langs = config('enum.locales_text'))
                                        <div class="dropdown dropdown-smooth-01 dropdown-language">
                                            <a href="#" class="btn btn-text-inherit btn-interactive" id="dropdownLangauge" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="image"><img src="{{ url('/') }}/frontend/icons/{{ app()->getLocale() }}.png" alt="image" /></span> {{ isset($langs)?$langs[app()->getLocale()]:'' }}
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownLangauge">
                                                <div class="dropdown-menu-inner">
                                                    @foreach (config('enum.locales') as $locale)
                                                        <a class="dropdown-item" href="{{ Str::replaceFirst(app()->getLocale(), $locale, request()->getRequestUri()) }}"><span class="image"><img src="{{ url('/') }}/frontend/icons/{{ $locale }}.png" alt="image" /></span>{{ config('enum.locales_text')[$locale] }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-shrink">

                                    <div class="col-inner">

                                        <div class="dropdown dropdown-smooth-01 dropdown-currency">
                                            <a href="#" class="btn btn-text-inherit btn-interactive" id="dropdownCurrency" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-font"><i class="oi oi-dollar text-primary mr-5"></i></span> US dollar
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownCurrency">
                                                <div class="dropdown-menu-inner">
                                                    <a class="dropdown-item" href="#"><span class="icon-font"><i class="oi oi-dollar text-primary mr-10"></i></span>US Dollar</a>
                                                    <a class="dropdown-item" href="#"><span class="icon-font"><i class="oi oi-british-pound text-primary mr-10"></i></span>UK Pound</a>
                                                    <a class="dropdown-item" href="#"><span class="icon-font"><i class="oi oi-euro text-primary mr-10"></i></span>EU Euro</a>
                                                    <a class="dropdown-item" href="#"><span class="icon-font"><i class="oi oi-yen text-primary mr-10"></i></span>JP Yen</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-12 col-auto">

                    <div class="col-inner">
                        <ul class="footer-contact-list">
                            <li>
                                <span class="icon-font text-primary inline-block-middle mr-5 font16"><i class="fa fa-phone"></i></span> <span class="font700 text-black">1 2258 2554 00</span> <span class="text-muted">Evry day | 9:00am-11pm</span>
                            </li>
                            <li>
                                <span class="icon-font text-primary inline-block-middle mr-5 font16"><i class="fa fa-envelope"></i></span> <span class="font700 text-black">info@reflectionstravel.com</span>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

            <hr class="opacity-7" />

        </div>

    </div>

    <div class="main-footer">

        <div class="container">

            <div class="row gap-50">

                <div class="col-12 col-lg-5">

                    <div class="footer-logo">
                        <img src="{{ url('/') }}/frontend/images/logo.png" alt="images" />
                    </div>

                    <p class="mt-20">Excited him now natural saw passage offices you minuter. At by asked being court hopes. Farther so friends am to detract. Forbade concern do private be. Offending residence but men engrossed shy.</p>

                    <a href="#" class="text-capitalize font14 h6 line-1 mb-0 font500 mt-30">read more <i class="elegent-icon-arrow_right font18 inline-block-middle"></i></a>

                </div>

                <div class="col-12 col-lg-7">

                    <div class="col-inner">

                        <div class="row shrink-auto-sm gap-30">

                            <div class="col-6 col-shrink">

                                <div class="col-inner">
                                    <h5 class="footer-title">About company</h5>
                                    <ul class="footer-menu-list set-width">
                                        <li><a href="{{ route('about_us') }}">About us</a></li>
                                        <li><a href="{{ route('company_history') }}">Company history</a></li>
                                        <li><a href="{{ route('legal') }}">Legal</a></li>
                                        <li><a href="{{ route('partners') }}">Partners</a></li>
                                        <li><a href="{{ route('privacy') }}">Privacy notice</a></li>
                                    </ul>
                                </div>

                            </div>

                            <div class="col-6 col-shrink">

                                <div class="col-inner">
                                    <h5 class="footer-title">Customer Service</h5>
                                    <ul class="footer-menu-list set-width">
                                        <li><a href="{{ route('payment') }}">Payment</a></li>
                                        <li><a href="{{ route('feedback') }}">Feedback</a></li>
                                        <li><a href="{{ route('contact_us') }}">Contact us</a></li>
                                        <li><a href="#">FAQ</a></li>
                                    </ul>
                                </div>

                            </div>

                            <div class="col-12 col-auto">

                                <div class="col-inner">
                                    <h5 class="footer-title">Newsletter &amp; Social</h5>
                                    <p class="font12">Savings her pleased are several started females met. Short her not among being any.</p>
                                    <form class="footer-newsletter mt-20">
                                        <div class="input-group">
                                            <input type="email" class="form-control" placeholder="Email address">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button"><i class="far fa-envelope"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="footer-socials mt-20">
                                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                                        <a href="#"><i class="fab fa-google-plus-square"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-square"></i></a>
                                        <a href="#"><i class="fab fa-flickr"></i></a>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="bottom-footer">

        <div class="container">

            <div class="row shrink-auto-md gap-10 gap-40-lg">

                <div class="col-auto">
                    <div class="col-inner">
                        <ul class="footer-menu-list-02">
                            <li><a href="{{ route('cookies') }}">Cookies</a></li>
                            <li><a href="{{ route('policies') }}">Policies</a></li>
                            <li><a href="{{ route('terms') }}">Terms</a></li>
                        </ul>
                    </div>
                </div>
                <hr>
                @can('show dashboard')
                <div class="links">
                    <a href="{{ url('dashboard') }}">Dashboard</a>
                </div>
                @endcan
                <div class="col-shrink">
                    <div class="col-inner">
                        <p class="footer-copy-right"> &#169; 2005 – 2018 <span class="text-primary">MyCompany Ltd.,</span> All Rights Reserved.</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

</footer>
