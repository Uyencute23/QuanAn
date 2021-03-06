{{-- <style>
    .signup-section {
        padding: 0.3rem 0rem;
    }

    .social-buttons .btn {
        margin: 10px;
    }

    .modal-header {
        .close {
            margin-top: -1.5rem;
        }
    }

    .form-title {
        margin: -2rem 0rem 2rem;
    }

    .btn-round {
        border-radius: 3rem;
    }

    .delimiter {
        padding: 1rem;
    }

    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 400px;

            .modal-content {
                padding: 1rem;
            }
        }
    }

</style>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h4>Login</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email1" placeholder="Your email address...">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password1" placeholder="Your password...">
                        </div>
                        <button type="button" class="btn btn-info btn-block btn-round">Login</button>
                    </form>

                    <div class="text-center text-muted delimiter">or use a social network</div>
                    <div class="d-flex justify-content-center social-buttons">
                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip"
                            data-placement="top" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip"
                            data-placement="top" title="Facebook">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip"
                            data-placement="top" title="Linkedin">
                            <i class="fab fa-linkedin"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div>
            </div>
        </div>

    </div>
</div> --}}
<style>



</style>
<div class="modal modal-login fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <button type="button" class="text-right close mr-2" data-dismiss="modal"><span
                    aria-hidden="true">??</span></button>
            <div class="modal-login-content row ">
                <div class="col pl-5 pr-5">
                    <nav class="login-nav nav nav-tabs" role="tablist">
                        <a id="controlled-tab-tab-login" data-toggle="tab" href="#login-form" aria-selected="true"
                            class="nav-item nav-link active"><b>????NG NH???P</b></a>
                        <a id="controlled-tab-tab-register" data-toggle="tab" href="#registration-form"
                            aria-selected="false" class="nav-item nav-link"><b>????NG K??</b></a>
                    </nav>
                    <div class="tab-content">
                        <div id="login-form" aria-labelledby="controlled-tab-tab-login" role="tabpanel"
                            aria-hidden="false" class="fade tab-pane active in show">
                            <form id="login" action="">
                                @csrf
                                <div class="form-group">
                                    <label><b>Email</b></label>
                                    <input autocomplete="email" type="email" class="form-control" placeholder="Email"
                                        name="email" required>
                                </div>
                                <div class="form-group">
                                    <label><b>M???t kh???u</b></label>
                                    <div class="password-icon">
                                        <input type="password" autocomplete="current-password" id="password"
                                            class="form-control" placeholder="M???t kh???u" name="password" minlength="8"
                                            required>
                                        <span class="icon">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                <div>
                                    <p id="error_message" class="text-danger"></p>
                                </div>
                                <div class="form-group clearfix">
                                    <a href="#" class="btn-forgotpw" title="Forgot password">Qu??n m???t kh???u</a>
                                </div>

                                <div class="modal-footer">
                                    <div class="col">
                                        <button class="btn btn-primary btn-block" type="submit" title="Sign in">????ng
                                            nh???p</button>
                                        {{-- <button class="btn btn-outline-primary btn-block " type="button">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                            <span>????ng nh???p
                                                Facebook</span>
                                        </button>
                                        <button class="btn btn-outline-primary btn-block" type="button">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <span>Checkout as guest</span>
                                        </button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="registration-form" aria-labelledby="controlled-tab-tab-register" role="tabpanel"
                            aria-hidden="true" class="fade tab-pane">
                            <form id="signup" action="">
                                @csrf
                                <div class="form-group">
                                    <label><b>H??? T??n</b></label><input autocomplete="given-name" class="form-control"
                                        placeholder="Nh???p h??? t??n" minlength="2" name="name" required>

                                </div>
                                <div class="form-group">
                                    <label><b>Email</b></label><input autocomplete="email" type="email" class="form-control"
                                        placeholder="Nh???p email" name="email" required>

                                </div>
                                <div class="form-group">
                                    <label><b>M???t kh???u</b></label>
                                    <div class="password-icon">
                                        <input type="password" autocomplete="new-password" class="form-control"
                                            placeholder="Nh???p m???t kh???u" minlength="8" name="password" required>

                                        <span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Nh???p l???i m???t kh???u</b></label>
                                    <div class="password-icon">
                                        <input type="password" autocomplete="new-password" class="form-control"
                                            placeholder="Nh???p l???i m???t kh???u" minlength="8"
                                            name="password_confirmation" required>

                                        <span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div>
                                    <p id="error_message_signup" class="text-danger"></p>
                                </div>
                                <div class="modal-footer">
                                    <div class="col">
                                        <button class="btn btn-primary btn-block" type="submit" title="Sign up">????ng
                                            k??</button>
                                        {{-- <p class="notes">By registering, you agree to
                                            <a href="/dieu-khoan-su-dung" title="Lotteria's Terms of Use">Lotteria's
                                                Terms of Use</a> &amp;
                                            <a href="/chinh-sach-bao-mat" title="Privacy Policy">Privacy Policy</a>
                                        </p> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md pl-0">  
                    <div style=" height: 100%;">
                        <img alt=""
                            src="https://cf.shopee.vn/file/e84d48eafc224c442f61e35ad204b31d"
                            {{-- https://i.pinimg.com/736x/e7/53/11/e753116b40521dd4f6c7b8e895dede87.jpg --}}
                            style="width: 100%;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#login', function() {
                // alert('hihi')
                {
                    $('#error_message').html('')
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('login') }}',
                        data: $('#login').serialize(),
                        success: function(data) {
                            // if (data.success) {      
                            // }
                            alert(data.success)
                            location.reload();
                        },
                        error: function(er) {
                            console.log(er.responseText)
                            if (er.status == 422) {
                                $('#error_message').html('T??i kho???n ho???c m???t kh???u kh??ng ????ng!')
                            }
                        }

                    });
                    console.log({{ session('status') }})
                }
                return false;
            });

            $(document).on('submit', '#signup', function() {
                // alert('hihi')
                {
                    $('#error_message_signup').html('')
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('register') }}',
                        data: $('#signup').serialize(),
                        success: function(data) {
                            // if (data.success) {      
                            // }
                            alert(data.success)
                            location.reload();
                        },
                        error: function(er) {
                            e = JSON.parse(er.responseText)
                            console.log(e)
                            var mess = ''
                            if (er.status == 422) {
                                if (e.errors.email) {
                                    mess = 'Email ???? c?? ng?????i s??? d???ng!'
                                }
                                if (e.errors.password) {
                                    mess = mess + '<br> M???t kh???u kh??ng tr??ng kh???p!'
                                }
                                console.log(mess)
                                $('#error_message_signup').html(mess)
                            }
                        }

                    });
                    console.log({{ session('status') }})
                }
                return false;
            });
        });
    </script>
@endpush
