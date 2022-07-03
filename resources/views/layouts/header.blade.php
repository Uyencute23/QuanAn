<style>
    #lblCartCount {
        font-size: 10px;
        padding: 5px 5px;
        vertical-align: top;
        margin-left: -13px;
        margin-top: -7px;
    }

    .search-box {
        width: fit-content;
        height: fit-content;
        position: relative;
    }

    .input-search {
        height: 35px;
        width: 5px;
        border-style: none;
        padding: 10px;
        font-size: 14px;
        letter-spacing: 2px;
        outline: none;
        border-radius: 25px;
        transition: all .5s ease-in-out;
        background-color: #21daeb00;
        padding-right: 10px;
        color: #fff;
    }

    .input-search::placeholder {
        color: rgba(255, 255, 255, .5);
        font-size: 14px;
        letter-spacing: 2px;
        font-weight: 100;
    }

    .btn-search {
        /* width: 50px;
        height: 50px; */
        /* border-style: none;
        font-size: 20px; */
        font-weight: bold;
        outline: none;
        cursor: pointer;
        border-radius: 50%;
        position: absolute;
        right: 0px;
        color: #ffffff;
        background-color: transparent;
        pointer-events: painted;
    }

    .btn-search:focus~.input-search {
        width: 300px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid rgba(255, 255, 255, .5);
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }

    .input-search:focus {
        width: 300px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid rgba(255, 255, 255, .5);
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }
</style>
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span>
                    Chicken Cool
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ml-2 ">
                    @if (isset($active) && $active == 1)
                        <li class="nav-item active">
                        @else
                        <li class="nav-item">
                    @endif
                    <a class="nav-link" href="{{ route('home') }}">TRANG CHỦ <span
                            class="sr-only">(current)</span></a>
                    </li>


                    @if (isset($active) && $active == 2)
                        <li class="nav-item active">
                        @else
                        <li class="nav-item">
                    @endif
                    <a class="nav-link" href="{{ route('about') }}">GIỚI THIỆU</a>
                    </li>

                    @if (isset($active) && $active == 3)
                        <li class="nav-item active">
                        @else
                        <li class="nav-item">
                    @endif
                    <a class="nav-link" href="{{ route('menu') }}">THỰC ĐƠN</a>
                    </li>

                    {{-- @if (isset($active) && $active == 4)
                       <li class="nav-item active"> 
                    @else
                        <li class="nav-item">
                    @endif
                        <a class="nav-link" href="{{ route('promo') }}">KHUYẾN MÃI</a>
                    </li> --}}

                    @if (isset($active) && $active == 5)
                        <li class="nav-item active">
                        @else
                        <li class="nav-item">
                    @endif
                    <a class="nav-link" href="{{ route('news') }}">TIN TỨC &nbsp;&nbsp;</a>
                    </li>

                </ul>
                <style>
                    #lblCartCount {
                        font-size: 10px;
                        padding: 5px 5px;
                        vertical-align: top;
                        margin-left: -10px;
                        margin-top: -7px;
                    }
                </style>

                <div class="user_option">

                    <div class="dropdown">
                        <a @if (!Auth::user()) data-toggle="modal" data-target="#loginModal" @endif
                            data-toggle="dropdown" href="" class="user_link">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu">
                            @if (Auth::check() && (Auth::user()->role_id == 1 || Auth::user()->role_id == 9))
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            @endif
                            <a class="dropdown-item" href="#">Thông tin người dùng</a>
                            {{-- <div class="dropdown-divider"></div> --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                 this.closest('form').submit();">Đăng
                                    xuất</a>
                            </form>
                        </div>
                    </div>

                    @livewire('navbar')
                    <div class="search-box ml-2">
                        {{-- <button class="btn-search"><i class="fas fa-search"></i></button> --}}
                        <button class="btn  btn-search my-2 my-sm-0 ">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                        <input type="text" class="input-search" placeholder="Tìm kiếm...">

                    </div>


                    {{-- <a href="" class="order_online">
                                Order Online
                            </a> --}}
                </div>


            </div>
        </nav>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.btn-search').click(function() {
                    if ($('.input-search').css('width') > '30px') {
                        //router('/search?q=' + $('.input-search').val());
                        window.location.href = '{{ route('menu') }}?search=' + $('.input-search').val();
                    }
                });
                //input-search press enter
                $('.input-search').keypress(function(e) {
                    if (e.which == 13) {
                        window.location.href = '{{ route('menu') }}?search=' + $('.input-search').val();
                    }
                });

            });
        </script>
    @endpush
</header>
