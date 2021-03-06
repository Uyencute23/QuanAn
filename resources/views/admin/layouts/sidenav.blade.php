<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <img src="{{ asset('admin/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Chicken Cool</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link @if (isset($active) && $active[1] == 0) active @endif " href="{{ route('dashboard') }}">
                    <div
                        class="text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link producttype" data-bs-toggle="collapse" href="#collapse1"
                    aria-expanded="@if (isset($active) && $active[0] == 1) {{ 'true' }}@else{{ 'false' }} @endif"
                    aria-controls="collapse1">
                    <div class="producttype text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <span class="nav-link-text ms-1">Bán Hàng</span>
                </a>
            </li>
            <div class="collapse @if (isset($active) && $active[0] == 1) show @endif ms-3" id="collapse1">
                <li class="nav-item">
                    <a class="nav-link  @if (isset($active) && $active[0] == 1 && $active[1] == 1) active @endif"
                        href="{{ route('createorder.index') }}">
                        <div
                            class="text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-cart-plus text-success"></i>
                        </div>
                        <span class="nav-link-text ms-1 ">Tạo hóa đơn</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if (isset($active) && $active[0] == 1 && $active[1] == 2) active @endif"
                        href="{{ route('order.index') }}">
                        <div
                            class=" text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-scroll text-warning"></i>
                        </div>
                        <span class="nav-link-text ms-1 ">Quản lý hóa đơn</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if (isset($active) && $active[0] == 1 && $active[1] == 3) active @endif"
                        href="{{ route('voucher.index') }}">
                        <div
                            class=" text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-swatchbook" style="color: rgb(226, 233, 32)"></i>
                        </div>
                        <span class="nav-link-text ms-1 ">Quản lý voucher</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link  @if (isset($active) && $active[1] == 4) active @endif"
                        href="{{ route('product.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-utensils text-warning"></i>
                        </div>
                        <span class="nav-link-text ms-1 ">Quản lý món ăn</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if (isset($active) && $active[1] == 5) active @endif"
                        href="{{ route('product-type.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-clipboard-list text-danger"></i>
                        </div>
                        <span class="nav-link-text ms-1">Danh mục món ăn</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if (isset($active) && $active[1] == 6) active @endif" href="{{ route('user.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-friends    "></i>
                        </div>
                        <span class="nav-link-text ms-1">Quản lý người dùng</span>
                    </a>
                </li> --}}
            </div>
            <li class="nav-item">
                <a class="nav-link producttype" data-bs-toggle="collapse" href="#collapseTables"
                    aria-expanded="@if (isset($active) && $active[0] == 2) {{ 'true' }}@else{{ 'false' }} @endif"
                    aria-controls="collapseTables">
                    <div class="producttype text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-table"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý</span>
                </a>
            </li>
            <div class="collapse @if (isset($active) && $active[0] == 2) show @endif ms-3" id="collapseTables">

                <li class="nav-item">
                    <a class="nav-link  @if (isset($active) && $active[0] == 2 && $active[1] == 4) active @endif"
                        href="{{ route('product.index') }}">
                        <div
                            class="text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-utensils text-warning"></i>
                        </div>
                        <span class="nav-link-text ms-1 ">Quản lý món ăn</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if (isset($active) && $active[0] == 2 && $active[1] == 5) active @endif"
                        href="{{ route('product-type.index') }}">
                        <div
                            class="text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-clipboard-list text-danger"></i>
                        </div>
                        <span class="nav-link-text ms-1">Danh mục món ăn</span>
                    </a>
                </li>
                @if (Auth::user()->role_id == 9)
                    <li class="nav-item">
                        <a class="nav-link  @if (isset($active) && $active[0] == 2 && $active[1] == 2) active @endif"
                            href="{{ route('staff.index') }}">
                            <div
                                class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-user-shield text-info"></i>
                            </div>
                            <span class="nav-link-text ms-1 ">Quản lý nhân viên</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link  @if (isset($active) && $active[0] == 2 && $active[1] == 3) active @endif"
                        href="{{ route('customer.index') }}">
                        <div
                            class="text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-users text-success"></i>
                        </div>
                        <span class="nav-link-text ms-1 ">Quản lý khách hàng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if (isset($active) && $active[0] == 2 && $active[1] == 6) active @endif"
                        href="{{ route('user.index') }}">
                        <div
                            class="text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-friends    "></i>
                        </div>
                        <span class="nav-link-text ms-1">Quản lý người dùng</span>
                    </a>
                </li>
            </div>


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Thông tin cá nhân</span>
                </a>
            </li>

            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                     this.closest('form').submit();">
                        <div
                            class="text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-sign-out-alt text-warning" ></i>
                        </div>

                        <span class="nav-link-text ms-1">Đăng xuất</span>
                    </a>
                </form>

            </li>

            {{-- <li class="nav-item">
                <a class="nav-link " href="../pages/sign-up.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li> --}}
        </ul>
    </div>

</aside>
