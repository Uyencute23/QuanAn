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
            <div class="modal-login-content modal-body">
                <button type="button" class="close btn" data-dismiss="modal"><span
                        aria-hidden="true">×</span></button>
                <div class="left-content">
                    <nav class="login-nav nav nav-tabs" role="tablist">
                        <a id="controlled-tab-tab-login" data-toggle="tab" href="#login-form" aria-selected="true"
                            class="nav-item nav-link active">ĐĂNG NHẬP</a>
                        <a id="controlled-tab-tab-register" data-toggle="tab" href="#registration-form"
                            aria-selected="false" class="nav-item nav-link">ĐĂNG KÝ</a>
                    </nav>
                    <div class="tab-content">
                        <div id="login-form" aria-labelledby="controlled-tab-tab-login" role="tabpanel"
                            aria-hidden="false" class="fade tab-pane active in show">
                            <form id="login" action="" >
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input autocomplete="email" type="email" class="form-control" placeholder="Email" name="email"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <div class="password-icon">
                                        <input type="password" autocomplete="current-password" id="password"
                                            class="form-control" placeholder="Mật khẩu" name="password" minlength="8" required>
                                        <span class="icon">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <p id="error_message" class="text-danger"></p>
                                </div>
                                <div class="form-group clearfix">
                                    <a href="#" class="btn-forgotpw" title="Forgot password">Quên mật khẩu</a>
                                </div>
                                
                                <div class="modal-footer">
                                    <div class="col">
                                        <button class="btn btn-primary btn-block" type="submit" title="Sign in">Đăng nhập</button>
                                        {{-- <button class="btn btn-outline-primary btn-block " type="button">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                            <span>Đăng nhập
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
                                    <label>Họ và Tên</label><input autocomplete="given-name" class="form-control"
                                        placeholder="Nhập họ tên" minlength="2" name="name" required>

                                </div>
                                <div class="form-group">
                                    <label>Email</label><input autocomplete="email" type="email" class="form-control"
                                        placeholder="Nhập email" name="email" required>

                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <div class="password-icon">
                                        <input type="password" autocomplete="new-password" class="form-control"
                                            placeholder="Nhập mật khẩu" minlength="8" name="password" required>

                                        <span class="icon"><i class="fa fa-eye"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <div class="password-icon">
                                        <input type="password" autocomplete="new-password" class="form-control"
                                            placeholder="Nhập lại mật khẩu" minlength="8" name="password_confirmation"
                                            required>

                                        <span class="icon"><i class="fa fa-eye"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div>
                                    <p id="error_message_signup" class="text-danger"></p>
                                </div>
                                <div class="modal-footer">
                                    <div class="col">
                                        <button class="btn btn-primary btn-block" type="submit" title="Sign up">Đăng ký</button>
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
                <div class="right-content">
                    <div style=" height: 100%;">
                        <img alt="" src=" https://i.pinimg.com/736x/e7/53/11/e753116b40521dd4f6c7b8e895dede87.jpg"
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
                        url: '{{route('login')}}',
                        data: $('#login').serialize(),
                        success: function(data) {
                            // if (data.success) {      
                            // }
                            alert(data.success)
                            location.reload();
                        },
                        error: function(er)
                        {
                            console.log(er.responseText)
                            if(er.status == 422)
                            {
                                $('#error_message').html('Tài khoản hoặc mật khẩu không đúng!')
                            }
                        }
                        
                    });
                    console.log({{session('status')}})
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
                        error: function(er)
                        {
                            e = JSON.parse(er.responseText)
                            console.log(e)
                            var mess = ''
                            if(er.status == 422)
                            {
                                if(e.errors.email)
                                {
                                    mess = 'Email đã có người sử dụng!'
                                }
                                if(e.errors.password)
                                {
                                    mess = mess +  '<br> Mật khẩu không trùng khớp!'
                                }
                                console.log(mess)
                                $('#error_message_signup').html(mess)
                            }
                        }
                        
                    });
                    console.log({{session('status')}})
                }
                return false;
            });
        });
    </script>
@endpush
