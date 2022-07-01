@extends('admin.layouts.admin-app')
@section('content')
    <div class="row">
        <div class="col-md-7 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Chi tiết đơn hàng</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        @foreach ($order_details as $detail)
                            <li class="list-group-item border-0 d-flex p-2 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex ">
                                    <div>
                                        <img src="{{ $detail->product->img }}" class="avatar me-3" alt="user1">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $detail->product->name }}</h6>
                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                    </div>
                                </div>
                                {{-- <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm"></h6>
                                    <span class="mb-2 text-xs">Company Name: <span
                                            class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
                                    <span class="mb-2 text-xs">Email Address: <span
                                            class="text-dark ms-sm-2 font-weight-bold">oliver@burrito.com</span></span>
                                    <span class="text-xs">VAT Number: <span
                                            class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                                </div> --}}
                                <div class="ms-auto me-3 d-flex flex-column justify-content-center text-end">
                                    <span class="text-sm text-dark">{{ $detail->quantity }} x
                                        {{ number_format($detail->total, 0, ',', '.') }} đ</span>
                                    {{-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a> --}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-4">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Thông tin đơn hàng</h6>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <i class="far fa-calendar-alt me-2" aria-hidden="true"></i>
                            <small>{{ $order->created_at->format('d/m/Y H:i:s') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Khách hàng</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column ms-3">
                                <h6 class="mb-1 text-dark text-sm">Tên: {{ $order->customer->user->name }}</h6>
                                <h6 class="text-xs">Email: {{ $order->customer->user->email }}</h6>
                                <h6 class="text-xs">Địa chỉ: {{ $order->customer->address }}</h6>
                                <h6 class="text-xs">Số điện thoại: {{ $order->customer->phone }}</h6>
                            </div>
                        </li>

                    </ul>
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Hóa đơn</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-column ms-3">
                                    <h6 class="mb-1 text-dark text-sm">Mã hóa đơn: {{ $order->id }}</h6>
                                    <h6 class="text-xs">Trạng thái: {{ $order->status }}</h6>
                                    <h6 class="text-xs">Phí giao hàng:
                                        {{ number_format($order->shippingfee, 0, ',', '.') }}đ</h6>
                                    <h6 class="text-xs">Giảm giá: {{ number_format($promotion_price, 0, ',', '.') }}đ</h6>
                                    <h6 class="text-xs">Tổng giá trị đơn hàng:
                                        {{ number_format($order->total, 0, ',', '.') }}đ</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
