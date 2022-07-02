<div>
    <li class="nav-item dropdown pe-2 d-flex align-items-center">
        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fa fa-bell cursor-pointer"></i>
            <span class="fa-layers-top-left badge badge-pill bg-gradient-danger"
                id='lblCartCount'>{{ count($listNotifycation) }}</span>
                
        </a>
        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton"
            style="min-width: 300px">
            <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                        <div class="my-auto">
                            {{-- <img src="{{asset('admin/img/team-2.jpg')}}')}}" class="avatar avatar-sm  me-3 "> --}}
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1">
                                <span class="font-weight-bold">Thông báo mới</span>
                            </h6>
                            {{-- <p class="text-xs text-secondary mb-0">
                                <i class="fa fa-clock me-1"></i>
                                13 minutes ago
                            </p> --}}
                        </div>
                    </div>
                </a>
            </li>

            @foreach ($listNotifycation as $noti)
                <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="{{ $noti['link'] }}">
                        <div class="d-flex py-1">
                            <div class="my-auto">
                                <img src="{{ $noti['img'] }}" class="avatar avatar-sm  me-3 ">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm text-wrap font-weight-normal mb-1">
                                    <span class="font-weight-bold">{{ $noti['content'] }}</span>
                                </h6>
                                <p class="text-xs text-secondary mb-0">
                                    <i class="fa fa-clock me-1"></i>
                                    {{ $noti['created_at'] }}
                                </p>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </li>

</div>
