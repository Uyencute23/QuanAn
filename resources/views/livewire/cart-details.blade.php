<div>
    <div class="col-12">
        <h1 style="text-align: center;">GIỎ HÀNG</h1>
        <p style="text-align:start ">
            Bạn có <span class="text-info font-weight-bold">{{ count($detais) }} </span>sản phẩm trong giỏ hàng
        </p>
        @if (count($detais) > 0)

            <div class="row-12">
                <table id="shoppingCart" class="table table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th style="width: 50%;">SẢN PHẨM</th>
                            <th style="width: 15%;">ĐƠN GIÁ</th>
                            <th style="width: 17%;">SỐ LƯỢNG</th>
                            <th style="width: 12%;">TỔNG GIÁ</th>
                            <th style="max-width: 40px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detais as $detail)
                            <tr>
                                <td data-th="Product">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <a href="{{ route('product-detail', ['id' => $detail->product->id]) }}">
                                                <img src="{{ $detail->product->img }}" alt=""
                                                    class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                            </a>
                                        </div>


                                        <div class="col-md-9 mt-sm-2 d-flex align-items-center text-center">
                                            <a href="{{ route('product-detail', ['id' => $detail->product->id]) }}">
                                                <h2 class="text-center">
                                                    {{ $detail->product->name }}</h2>
                                            </a>
                                            {{-- <p class="font-weight-light">Brand &amp; Name</p> --}}
                                        </div>

                                    </div>
                                </td>
                                <td class="h3 align-middle">
                                    <h2> {{ number_format($detail->total, 0, ',', '.') }}đ</h2>
                                </td>
                                <td data-th="Quantity" class="align-middle">
                                    <input min="1" max="1000" data-id="{{ $detail->product_id }}" type="number"
                                        class="form-control input_quantity text-center " style="max-width: 70px;"
                                        value="{{ $detail->quantity }}">
                                </td>
                                <td class="h3 align-middle">
                                    <h2> {{ number_format($detail->total * $detail->quantity, 0, ',', '.') }}đ</h2>
                                </td>
                                <td class="align-middle">
                                    <div class="text-right" style="max-width: 10px;">
                                        <button class="btn btn-white border-secondary bg-white btn-md mb-2"
                                            onclick="del({{ $detail->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    {{-- <div class="mb-3">
        <div class=" d-flex justify-content-end">
            <h2 class="mr-3">Voucher</h2>
            <select name="promo_id" id="promo_id">
                <option>Chọn mã giảm giá</option>
                @foreach ($promo as $p)
                    <option value="{{ $p->id }}">{{ mb_strimwidth($p->name, 0, 50, '...') }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary ml-2">Áp dụng</button>
        </div>
    </div> --}}
    <div class="row-12  d-flex justify-content-end">
        <div class="float-right text-right">
            <h2>Thành tiền:</h2>
            <h1>{{ number_format($cart->total, 0, ',', '.') }}đ</h1>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.input_quantity').on('change keyup', function() {
                    quantity = parseInt($(this).val())
                    console.log(parseInt($(this).val()));
                    console.log('prod_id: ' + $(this).attr('data-id'));
                    if (quantity > 0) {
                        updateCart(parseInt($(this).val()), $(this).attr('data-id'))
                    } else if (quantity < 1) {
                        $(this).val(1)
                    }

                });
            });

            function del(id) {
                var url = '{{ route('cartdetail.del', ':id') }}'

                $.ajax({
                    type: 'GET',
                    url: url.replace(':id', id),
                    success: function(data) {
                        if (data.success) {
                            alert('Xoá thành công')
                            Livewire.emit('refreshCart')
                            Livewire.emit('refreshNavbar')
                        }
                        console.log(data)
                    }
                });
            }

            function updateCart(quantity, id) {
                if (quantity > 0) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('cartdetail.update') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            product_id: id,
                            quantity: quantity
                        },
                        success: function(data) {
                            if (data.success) {
                                console.log('Thêm thành công')
                                Livewire.emit('refreshCart')
                                Livewire.emit('refreshNavbar')
                            }
                            console.log(data)
                        }
                    });
                }
            }
        </script>
    @endpush

    @endif
</div>
