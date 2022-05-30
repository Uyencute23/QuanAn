<div class="col-lg-12 col-md-12 col-12">
    <h4 class="display-5 mb-2 text-center">GIỎ HÀNG</h4>
    <p class="mb-5 text-center">
        Bạn có <span class="text-info font-weight-bold">{{ count($detais) }} </span>Sản phẩm có trong giỏ
    </p>
    <table id="shoppingCart" class="table table-condensed table-responsive" style="width: 100%;">
        <thead>
            <tr>
                <th style="width: 50%;">SẢN PHẨM</th>
                <th style="width: 15%;">ĐƠN GIÁ</th>
                <th style="width: 13%;">SỐ LƯỢNG</th>
                <th style="width: 15%;">TỔNG GIÁ</th>
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
                        <input type="number" class="form-control form-control-lg text-center "
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
    <br>
    <div class="row  d-flex justify-content-end mb-3">
        
        <div class="col-4 d-flex justify-content-end">
            <h2 class="mr-3">Data List</h2>
            <input style="width: 250px;" class="form-control" list="browsers" name="browser" id="browser">
            <datalist id="browsers">
                <option value="Edge">
                <option value="Firefox">
                <option value="Chrome">
                <option value="Opera">
            </datalist>
        </div>
        <div class="d-flex align-items-center ">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    <div class="float-right text-right">
        <h2>Thành tiền:</h2>
        <h1>{{ number_format($cart->total, 0, ',', '.') }}đ</h1>
    </div>
</div>
@push('scripts')
    <script>
        function del(id) {
            var url = '{{ route('cartdetail.del', ':id') }}'
            $.ajax({
                type: 'GET',
                url: url.replace(':id', id),
                success: function(data) {
                    if (data.success) {
                        alert('Xoa thành công')
                        Livewire.emit('refreshCart')
                    }
                    console.log(data)
                }
            });
        }
    </script>
@endpush
