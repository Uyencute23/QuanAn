<div class="user_option">
    
    <div class="dropdown">
        <a @if (!Auth::user()) data-toggle="modal" data-target="#loginModal" @endif data-toggle="dropdown"
            href="" class="user_link">
            <i class="fa fa-user" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu">
            @if (Auth::check() && Auth::user()->role_id == 1)
            <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
            @endif
            <a class="dropdown-item" href="#">Thông tin người dùng</a>
            {{-- <div class="dropdown-divider"></div> --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                 this.closest('form').submit();">Đăng xuất</a>
            </form>
        </div>
    </div>
    <a @if (!Auth::user()) data-toggle="modal" data-target="#loginModal" @endif href="{{ route('cart') }}" class="user_link">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        <a>
            <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
            {{-- <a href="" class="order_online">
                Order Online
            </a> --}}
</div>
