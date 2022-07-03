<div>
    <a @if (!Auth::user()) data-toggle="modal" data-target="#loginModal" @endif
        href="{{ route('cart') }}" class="user_link">
        <i class="fa fa-shopping-cart" style="font-size: 17px" aria-hidden="true"></i>
        @if (Auth::user())
            <span class="fa-layers-top-left  badge badge-pill badge-danger" id='lblCartCount'>{{ $Totalcart }}</span>
        @endif
    </a>
</div>
