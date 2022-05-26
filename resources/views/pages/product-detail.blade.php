@extends('layouts.app')
@section('content')
    @if (isset($product))
        <div class="container">
            <div class="row">
                <div class="col"> <img src="{{ $product->img }}" style="width: 100%;" alt=""> </div>
                <div class="col p-0 b-h "><b>{{ $product->name }}</b><br>
                    <b style="color:#ee4d2d;">{{ number_format($product->price, 0, ',', '.') }}đ </b>
                    <hr>
                    <div class="row p-3">
                        <p style="font-size: 18px"> Mô tả: {{ $product->description }}</p>
                        <p style="font-size: 19px">Số lượng:</p>
                        <div class="col-sm">
                            <div class="input-group">
                                <span>
                                    <button type="button" class="btn btn-danger btn-number"
                                        style="border-top-right-radius: 0px; border-bottom-right-radius: 0px"
                                        disabled="disabled" data-type="minus" data-field="quant[1]">
                                        <span class="glyphicon glyphicon-minus">-</span>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quant[1]" class="form-control input-number"
                                    style="max-width: 45px;text-align: center;" value="1" min="1" max="100">
                                <span>
                                    <button type="button"  class="btn btn-danger btn-number"
                                        style="border-bottom-left-radius: 0px; border-top-left-radius: 0px" data-type="plus"
                                        data-field="quant[1]">
                                        <span class="glyphicon glyphicon-plus">+</span>
                                    </button>
                                </span>
                            </div>
                        </div>

                    </div>
                    <button class="add-cart" onclick="addProduct()"> <b>Thêm vào giỏ hàng </b></button>
                </div>
            </div>
            <hr>
        </div>
        @push('scripts')
            <script>
                function addProduct() {
                    if ($('#quantity').val() > 0) {
                        
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('product.add') }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                product_id: '{{ $product->id }}',
                                quantity: $('#quantity').val()
                            },
                            success: function(data) {
                                if(data.success)
                                {
                                    alert('Thêm thành công')
                                }
                                console.log(data)
                            }
                        });
                    }
                }
            </script>
        @endpush
    @endif
@endsection
