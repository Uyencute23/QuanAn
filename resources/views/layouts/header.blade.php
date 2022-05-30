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
                    @if ($active == 1)
                       <li class="nav-item active"> 
                    @else
                        <li class="nav-item">
                    @endif
                        <a class="nav-link" href="{{ route('home') }}">TRANG CHỦ <span
                                class="sr-only">(current)</span></a>
                    </li>

                    
                    @if ($active == 2)
                       <li class="nav-item active"> 
                    @else
                        <li class="nav-item">
                    @endif
                        <a class="nav-link" href="{{route('about')}}">GIỚI THIỆU</a>
                    </li>

                    @if ($active == 3)
                       <li class="nav-item active"> 
                    @else
                        <li class="nav-item">
                    @endif
                        <a class="nav-link" href="{{ route('menu') }}">THỰC ĐƠN</a>
                    </li>

                    @if ($active == 4)
                       <li class="nav-item active"> 
                    @else
                        <li class="nav-item">
                    @endif
                        <a class="nav-link" href="{{ route('promo') }}">KHUYẾN MÃI</a>
                    </li>

                    @if ($active == 5)
                       <li class="nav-item active"> 
                    @else
                        <li class="nav-item">
                    @endif
                        <a class="nav-link" href="book.html">TIN TỨC &nbsp;&nbsp;</a>
                    </li>

                </ul>
                @livewire('navbar')
            </div>
        </nav>
    </div>
</header>