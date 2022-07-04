<div class="modal fade modal-with-tabs form-login-modal" id="loginFormTabInModal" aria-labelledby="modalWIthTabsLabel"
     tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content shadow-lg">

            <nav class="d-none">
                <ul class="nav external-link-navs clearfix">
                    <li><a class="active" data-toggle="tab" href="#loginFormTabInModal-login">Sign-in</a></li>
                    <li><a data-toggle="tab" href="#loginFormTabInModal-register">Register </a></li>
                    <li><a data-toggle="tab" href="#loginFormTabInModal-forgot-pass">Forgot Password </a></li>
                </ul>
            </nav>

            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="loginFormTabInModal-login">

                    <div class="form-login">

                        <div class="form-header">
                            <h4>{{ __('Welcome Back to Reflections Travel') }}</h4>
                            <p>{{ __('Sign in to your account to continue using Reflections Travel') }}</p>
                        </div>

                        <div class="form-body">

                            <div class="form-alert"></div>

                            <form method="post" action="#">

                                <div class="d-flex flex-column flex-lg-row align-items-stretch">

                                    <div class="flex-md-grow-1 bg-primary-light">

                                        <div class="form-inner">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" type="text" class="form-control"
                                                       placeholder="email">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input name="password" type="password" class="form-control"
                                                       placeholder="password">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="d-flex flex-column flex-md-row mt-25">
                                                <div class="flex-shrink-0">
                                                    <a href="#" id="signin" class="btn btn-primary btn-wide">Sign-in</a>
                                                </div>
                                                <div class="ml-0 ml-md-15 mt-15 mt-md-0">
                                                    <div class="custom-control custom-checkbox">
                                                        <input name="remember_me" type="checkbox"
                                                               class="custom-control-input"
                                                               id="loginFormTabInModal-rememberMe">
                                                        <label class="custom-control-label"
                                                               for="loginFormTabInModal-rememberMe">Remember me</label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#loginFormTabInModal-forgot-pass"
                                               class="tab-external-link block mt-25 font600">Forgot password?</a>
                                        </div>

                                    </div>

                                    <div class="form-login-socials">
                                        <div class="login-socials-inner">
                                            <h5 class="mb-20">Or sign-up with your socials</h5>
                                            <div class="custom-control custom-checkbox">
                                                <input name="remember_me" type="checkbox" class="custom-control-input"
                                                       id="loginSocialsFormTabInModal-rememberMe">
                                                <label class="custom-control-label"
                                                       for="loginSocialsFormTabInModal-rememberMe">Remember me</label>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <a class="btn btn-login-with btn-google btn-block"
                                               href='{{ url("/". app()->getLocale() . "/auth/google/login") }}'
                                            ><i class="fab fa-google"></i> google</a>
                                            <a class="btn btn-login-with btn-facebook btn-block"
                                               href='{{ url("/". app()->getLocale() . "/auth/facebook/login") }}'
                                            ><i class="fab fa-facebook"></i> facebook</a>
                                            <a class="btn btn-login-with btn-twitter btn-block"
                                               href='{{ url("/". app()->getLocale() . "/auth/twitter/login") }}'
                                            ><i class="fab fa-twitter"></i> twitter</a>
                                        </div>
                                    </div>

                                </div>

                            </form>

                        </div>

                        <div class="form-footer">
                            <p>Not a member yet? <a href="#loginFormTabInModal-register"
                                                    class="tab-external-link font600">Sign up</a></p>
                        </div>

                    </div>

                </div>

                <div role="tabpanel" class="tab-pane fade in" id="loginFormTabInModal-register">

                    <div class="form-login">

                        <div class="form-header">
                            <h4>Reflections Travel</h4>
                            <p>Access a lot of tours in Egypt!</p>
                        </div>

                        <div class="form-body">

                            <div class="form-alert"></div>

                            <form method="post" action="#">

                                <div class="d-flex flex-column flex-lg-row align-items-stretch">

                                    <div class="flex-grow-1 bg-primary-light">

                                        <div class="form-inner">
                                            <div class="form-group">
                                                <label>First name</label>
                                                <input name="first_name" type="text" class="form-control">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group">
                                                <label>Last name</label>
                                                <input name="last_name" type="text" class="form-control">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group">
                                                <label>Email adress</label>
                                                <input name="email" type="text" class="form-control">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="row cols-2 gap-10">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input name="password" type="password" class="form-control">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Confirm password</label>
                                                        <input name="password_confirmation" type="password"
                                                               class="form-control">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-login-socials">
                                        <div class="login-socials-inner">
                                            <h5 class="mb-20">Or sign-in with your socials</h5>
                                            <a class="btn btn-login-with btn-google btn-block"
                                               href='{{ url("/". app()->getLocale() . "/auth/google/login") }}'
                                            ><i class="fab fa-google"></i> google</a>
                                            <a class="btn btn-login-with btn-facebook btn-block"
                                               href='{{ url("/". app()->getLocale() . "/auth/facebook/login") }}'
                                            ><i class="fab fa-facebook"></i> facebook</a>
                                            <a class="btn btn-login-with btn-twitter btn-block"
                                               href='{{ url("/". app()->getLocale() . "/auth/twitter/login") }}'
                                            ><i class="fab fa-twitter"></i> twitter</a>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-flex flex-column flex-md-row mt-30 mt-lg-10">
                                    <div class="flex-shrink-0">
                                        <a href="#" id="signup" class="btn btn-primary btn-wide mt-5">Sign-up</a>
                                    </div>
                                    <div class="pt-1 ml-0 ml-md-15 mt-15 mt-md-0">
                                        <div class="custom-control custom-checkbox">
                                            <input name="terms" type="checkbox" class="custom-control-input"
                                                   id="loginFormTabInModal-acceptTerm">
                                            <label class="custom-control-label line-145"
                                                   for="loginFormTabInModal-acceptTerm">By clicking this, you are agree
                                                to to our <a href="#">terms of use</a> and <a href="#">privacy
                                                    policy</a> including the use of cookies</label>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>

                        <div class="form-footer">
                            <p>Already a member? <a href="#loginFormTabInModal-login" class="tab-external-link font600">Sign
                                    in</a></p>
                        </div>

                    </div>

                </div>

                <div role="tabpanel" class="tab-pane fade in" id="loginFormTabInModal-forgot-pass">

                    <div class="form-login">

                        <div class="form-header">
                            <h4>Lost your password?</h4>
                            <p>Please provide your detail.</p>
                        </div>

                        <div class="form-body">

                            <div class="form-alert"></div>

                            <form method="post">
                                <p class="line-145">We'll send password reset instructions to the email address
                                    associated with your account.</p>
                                <div class="row">
                                    <div class="col-12 col-md-10 col-lg-8">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="email"/>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <button id="forgot-pass" class="btn btn-primary mt-5">Retreive password</button>
                            </form>

                        </div>

                        <div class="form-footer">
                            <p>Back to <a href="#loginFormTabInModal-login" class="tab-external-link font600">Sign
                                    in</a> or <a href="#loginFormTabInModal-register" class="tab-external-link font600">Sign
                                    up</a></p>
                        </div>

                    </div>

                </div>

            </div>

            <div class="text-center pb-20">
                <button type="button" class="close" data-dismiss="modal" aria-labelledby="Close">
                    <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                </button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function () {
            $('#signin').click(function () {
                let form = $('#loginFormTabInModal-login');
                let sendData = {
                    "id": 1,
                    "_token": Laravel.csrfToken,
                    "email": form.find('[name=email]').val(),
                    "password": form.find('[name=password]').val(),
                    "remember_me": 0
                };
                if (form.find('[name=remember_me]').is(':checked')) {
                    sendData.remember_me = 1;
                }
                $.ajax({
                    url: '{{ route('front.login') }}',
                    type: "POST",
                    data: sendData,
                    beforeSend: function (xhr) {
                        googleBar.start();
                    },
                    statusCode: {
                        422: function (data) {
                            var errors = data.responseJSON.errors;
                            if (typeof errors.public !== 'undefined') {
                                form.find('.form-alert').html(bsWidgets.alert('danger', errors.public[0]));
                            }
                            bsWidgets.formValidation('#loginFormTabInModal-login', errors);
                            googleBar.stop();
                        }
                    }
                }).done(function (data) {
                    Swal.fire(
                        'Loging success',
                        'redirecting...',
                        'success'
                    );
                    location.reload();
                    googleBar.stop();
                });
                return false;
            });

            $('#loginFormTabInModal-login input[name=email]').keyup(function () {
                $('#loginFormTabInModal-forgot-pass input[name=email]').val($(this).val());
            });

            $('#signup').click(function () {
                let form = $('#loginFormTabInModal-register');
                let sendData = {
                    "_token": Laravel.csrfToken,
                    "first_name": form.find('[name=first_name]').val(),
                    "last_name": form.find('[name=last_name]').val(),
                    "email": form.find('[name=email]').val(),
                    "password": form.find('[name=password]').val(),
                    "password_confirmation": form.find('[name=password_confirmation]').val(),
                    "terms": 0
                };
                if (form.find('[name=terms]').is(':checked')) {
                    sendData.terms = 1;
                }
                $.ajax({
                    url: '{{ route('front.register') }}',
                    type: "POST",
                    data: sendData,
                    beforeSend: function (xhr) {
                        googleBar.start();
                    },
                    statusCode: {
                        422: function (data) {
                            let errors = data.responseJSON.errors;
                            if (typeof errors.public !== 'undefined') {
                                form.find('.form-alert').html(bsWidgets.alert('danger', errors.public[0]));
                            }
                            bsWidgets.formValidation('#loginFormTabInModal-register', errors);
                            googleBar.stop();
                        }
                    }
                }).done(function (data) {
                    Swal.fire(
                        'Register success',
                        'redirecting...',
                        'success'
                    );
                    location.reload();
                    googleBar.stop();
                });
                return false;
            });

            $('#logout').click(function () {
                var sendData = {
                    "_token": Laravel.csrfToken
                };
                $.ajax({
                    url: '{{route('logout')}}',
                    type: "POST",
                    data: sendData,
                    beforeSend: function (xhr) {
                        googleBar.start();
                    },
                    statusCode: {
                        422: function (data) {
                            var errors = data.responseJSON.errors;
                            if (typeof errors.public !== 'undefined') {
                                form.find('.form-alert').html(bsWidgets.alert('danger', errors.public[0]));
                            }
                            bsWidgets.formValidation('#loginFormTabInModal-register', errors);
                            googleBar.stop();
                        }
                    }
                })
                    .done(function (data) {
                        location.reload();
                        googleBar.stop();
                    });
                return false;
            });

            $('#forgot-pass').click(function () {
                let form = $('#loginFormTabInModal-forgot-pass');
                let sendData = {
                    "_token": Laravel.csrfToken,
                    "email": form.find('input[name=email]').val()
                };
                $.ajax({
                    url: '{{route('password.email')}}',
                    type: "POST",
                    data: sendData,
                    beforeSend: function (xhr) {
                        googleBar.start();
                    },
                    statusCode: {
                        422: function (data) {
                            var errors = data.responseJSON.errors;
                            if (typeof errors.public !== 'undefined') {
                                form.find('.form-alert').html(bsWidgets.alert('danger', errors.public[0]));
                            }
                            bsWidgets.formValidation('#loginFormTabInModal-forgot-pass', errors);
                            googleBar.stop();
                        }
                    }
                })
                    .done(function (data) {
                        Swal.fire(
                            'Message sent success',
                            'Check your email for reset password link.',
                            'success'
                        );
                        googleBar.stop();
                    });
                return false;
            });

            $('.form-login-socials a.btn').click(function () {
                if ($('.form-login-socials').find('[name=remember_me]').is(':checked')) {
                    location.href = $(this).attr('href') + '?remember_me=1';
                } else {
                    location.href = $(this).attr('href');
                }
                return false;
            });

        });
    </script>
@endpush
