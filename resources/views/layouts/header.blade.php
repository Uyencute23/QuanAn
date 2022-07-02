<style>
    #lblCartCount {
        font-size: 10px;
        padding: 5px 5px;
        vertical-align: top;
        margin-left: -10px;
        margin-top: -7px;
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

                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    {{-- <a href="" class="order_online">
                                Order Online
                            </a> --}}
                </div>


            </div>
        </nav>
    </div>
</header>
