<div>
    <style>
        .order.table-responsive {
            max-height: 400px;
            min-height: 400px;
            overflow-x: hidden;
        }

        .order.table-responsive::-webkit-scrollbar {
            width: 1px;
        }

        .order.table-responsive::-webkit-scrollbar-thumb {
            background: rgb(144, 144, 144);
            border-radius: 10px;
        }

        .table-fixed tbody {
            max-height: 400px;
            min-height: 400px;
            overflow-y: auto;
            width: 100%;
        }
    </style>
    <div class="card-header pb-0 px-3">
        <div class="row">
            <div class="col-md-6">
                <h6 class="mb-0">Chi tiết hóa đơn</h6>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <i class="far fa-calendar-alt me-2" aria-hidden="true"></i>
                <small>Ngày {{ date('d - m - Y') }}</small>
            </div>
        </div>
    </div>
    <div class="card-body pt-4 p-3" style="overflow: hidden;">
        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Sản phẩm</h6>
        <div class="order table-responsive">
            <table class="table table-fixed ">
                <thead>
                    <tr>
                        <th scope="col p-0">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        {{-- <th scope="col">Số lượng</th> --}}
                        <th scope="col">Số lượng | Đơn giá</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listItems as $item)
                        <tr>
                            <th class="text-center" scope="row">{{ $loop->index + 1 }}</th>
                            <td class="text-wrap">
                                @if (isset($item['name']))
                                    <h6 class="mb-1 text-dark text-sm">{{ $item['name'] }}</h6>
                                @endif
                            </td>
                            {{-- <td>{{ $item['quantity'] }}</td> --}}
                            <td class="text-center">{{ $item['quantity'] }} x
                                &nbsp;{{ number_format($item['price'], 0, ',', '.') }}đ</td>
                            <td class="text-center">
                                <button onclick="removeItem({{ $item['id'] }})"
                                    class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                    <i class="fas fa-trash "></i>
                                </button>
                                <button onClick="minusItem({{ $item['id'] }})"
                                    class="mt-2 btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-minus"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <hr>
        <div class="row">
            {{-- dropdow promotion --}}
            <div class="col ms-3">
                <h6 class="mb-3">Mã khuyến mãi:</h6>
            </div>
            <div class="col form-group">
                <select class="form-control" id="promotion" wire:model="promotion" wire:change="$emit('applyPromotion')">
                    <option value="0">Không</option>
                    @foreach ($promotions as $promotion)
                        <option value="{{ $promotion->id }}">{{ $promotion->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <h6 class="ms-3">Tổng số lượng:</h6>
            </div>
            <div class="col-4">
                <h6 class="text-end "> {{ $total_quantity }} sản phẩm</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <h6 class="ms-3">Giảm giá:
                </h6>
            </div>
            <div class="col-4">
                <h6 class="text-end "> {{ number_format($promotion_price, 0, ',', '.') }} đ</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <h4 class="text-cappitalize text-body font-weight-bolder ms-3">Thành tiền:
                </h4>
            </div>
            <div class="col-4">
                <h4 class="text-end"> {{ number_format($total, 0, ',', '.') }}đ</h4>
            </div>
        </div>
       
        <div class="d-flex justify-content-end">
            {{-- button thanh toan --}}
            <button class="btn btn-danger btn-block" onclick="createOrder()">Thanh toán</button>
        </div>
        {{-- <ul class="list-group">
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                    <button
                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                            class="fas fa-arrow-up" aria-hidden="true"></i></button>
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Stripe</h6>
                        <span class="text-xs">26 March 2020, at 13:45 PM</span>
                    </div>
                </div>
                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 750
                </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                    <button
                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                            class="fas fa-arrow-up" aria-hidden="true"></i></button>
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">HubSpot</h6>
                        <span class="text-xs">26 March 2020, at 12:30 PM</span>
                    </div>
                </div>
                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 1,000
                </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                    <button
                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                            class="fas fa-arrow-up" aria-hidden="true"></i></button>
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Creative Tim</h6>
                        <span class="text-xs">26 March 2020, at 08:30 AM</span>
                    </div>
                </div>
                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 2,500
                </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                    <button
                        class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                            class="fas fa-exclamation" aria-hidden="true"></i></button>
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Webflow</h6>
                        <span class="text-xs">26 March 2020, at 05:00 AM</span>
                    </div>
                </div>
                <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                    Pending
                </div>
            </li>
        </ul> --}}
    </div>
</div>
