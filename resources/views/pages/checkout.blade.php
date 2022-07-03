@extends('layouts.app')
@section('content')
    <div class="container mt-3 mb-5">
        <!------ Include the above in your HEAD tag ---------->
        {{-- <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div> --}}
        <div class="row cart-body mt-5 mb-5">
            <div class="col-lg-7">
                <!--REVIEW ORDER-->
                <div class="panel panel-info">
                    <h3 class="text-center mb-3">THÔNG TIN SẢN PHẨM</h3>
                    <hr>
                    <div class="panel-body">
                        @foreach ($detais as $detail)
                            <div class="row">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{{ $detail->product->img }}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">
                                        <h5 class="font-weight-bold">{{ $detail->product->name }}</h5>
                                    </div>
                                    <div class="col-xs-12 h6">Số
                                        lượng:<span>{{ $detail->quantity }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h4 class="font-weight-bold">
                                        {{ number_format($detail->total * $detail->quantity, 0, ',', '.') }}đ</h4>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="input-group mb-3">
                        <input style="border-top-left-radius: 5px;border-bottom-left-radius: 5px" type="text"
                            class="form-control" id="voucher" placeholder="Mã giảm giá" aria-label="Mã giảm giá"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button style="border-top-right-radius: 5px;border-bottom-right-radius: 5px" onclick="apply()"
                                class="btn btn-primary" type="button">Áp dụng</button>
                        </div>
                    </div>
                    @livewire('totalcheckout')
                </div>


                <!--REVIEW ORDER END-->
            </div>

            <div class="col-lg-5">
                <!--SHIPPING METHOD-->
                <div class="panel panel-info">
                    <h3 class="text-center mb-3">THÔNG TIN GIAO HÀNG</h3>
                    <div class="panel-body">
                        {{-- <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div> --}}
                        {{-- <div class="form-group">
                                <div class="col-md-12"><strong>Country:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="country" value="" />
                                </div>
                            </div> --}}
                        <form id="check-out" action="">
                            @csrf
                            <div class="form-group">
                                <div class=" col-md-12">
                                    <strong>Họ và tên:</strong>
                                    <input name="name_u" type="text" disabled class="form-control"
                                        value="{{ Auth::user()->name }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa Chỉ:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address_u" maxlength="150" class="form-control"
                                        value="@if (Auth::user()->customer->address) {{ Auth::user()->customer->address }} @endif"
                                        required />
                                </div>

                            </div>
                            {{-- <div class="form-group">
                            <div class="col-md-12"><strong>Thành Phố:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="city" class="form-control" value="" />
                            </div>
                        </div> --}}
                            {{-- <div class="form-group">
                            <div class="col-md-12"><strong>Trạng thái:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="state" class="form-control" value="Đang giao hàng" disabled />
                            </div>
                        </div> --}}
                            {{-- <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="" />
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                                <div class="col-md-12"><input type="tel" minlength="10" maxlength="11" name="phone_u"
                                        class="form-control"
                                        value="@if (Auth::user()->customer->phone) {{ Auth::user()->customer->phone }} @endif"
                                        required />
                                </div>
                                {{-- error message --}}
                                <div class="col-md-12 text-danger mt-2" style="display: none" id="error_phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12"><input type="text" name="email_u" class="form-control" disabled
                                        value="@if (Auth::user()->email) {{ Auth::user()->email }} @endif" />
                                </div>
                            </div>
                            {{-- <div class="form-group">
                            <div class="col-md-12"><strong>Ghi chú:</strong></div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div> --}}
                            {{-- <div class="form-group">
                            <div class="col-md-12"><strong>Hình thức giao hàng:</strong></div>
                            <div class="col-md-12">
                                <select id="CreditCardType" name="CreditCardType" class="form-control">
                                    <option value="5">Thanh toán bằng tiền mặt</option>
                                    <option value="6">Thanh toán bằng thẻ ngân hàng</option>
                                </select>
                            </div>
                        </div> --}}
                            <div class="row ml-1">
                                <div class="col">
                                    <a href="{{ route('home') }}" type="button" class="btn btn-secondary">
                                        TIẾP TỤC MUA HÀNG
                                    </a>
                                </div>
                                <div class="col d-flex justify-content-end mr-3"> <button class="btn btn-danger "
                                        type="submit">ĐẶT HÀNG </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <!--SHIPPING METHOD END-->

            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#check-out', function() {
                // alert($('input[name="promo_id"]').val())
                let id = '{{ Auth::user()->customer->id }}';
                //coutn $detais
                let count = {{ count($detais) }};
                if (count == 0) {
                    alert('Bạn chưa có sản phẩm nào');
                    return false;
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('checkout.create') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            customer_id: id,
                            address: $('input[name="address_u"]').val(),
                            phone: $('input[name="phone_u"]').val(),
                            promo_id: $('input[name="promo_id"]').val(),
                        },
                        success: function(data) {
                            // if (data.success) {      
                            // }
                            alert(data.success)
                            console.log(data);
                            window.location.href = data.link;
                            // location.reload();
                        },
                        error: function(er) {
                            // alert(er.responseJSON.message)
                            if (er.responseJSON.errors.phone) {
                                //set text error
                                $('#error_phone').text('Số điện thoại không hợp lệ');
                                $('#error_phone').show();

                            }
                            console.log(er)
                            // if (er.status == 422) {
                            //     $('#error_message').html('Tài khoản hoặc mật khẩu không đúng!')
                            // }
                        }

                    });
                }
                console.log('{{ route('customer.store') }}')
                return false;
            });
            //submit form and create order
            // $(document).on('submit', '#check-out', function() {
            //     {
            //         alert('Đặt hàng thành công');
            //         // $('#error_message').html('')
            //         let id = '{{ Auth::user()->customer->id }}';
            //         $.ajax({
            //             type: 'POST',
            //             url: '{{ route('customer.store') }}',
            //             data: {
            //                 _token: '{{ csrf_token() }}',
            //                 'data[' + id + '][user][name]': Lưu Hoàng Long,
            //                 'data[' + id + '][user][email]': long @gmail.com,
            //                 'data[' + id + '][phone]': 0123456789,
            //                 'data[' + id + '][address]': Nha Trang,
            //                 'data[' + id + '][img]': '',
            //                 action: edit,
            //             },
            //             success: function(data) {
            //                 // if (data.success) {      
            //                 // }
            //                 alert(data.success)
            //                 console.log(data);
            //                 // location.reload();
            //             },
            //             error: function(er) {
            //                 console.log(er.responseText)
            //                 // if (er.status == 422) {
            //                 //     $('#error_message').html('Tài khoản hoặc mật khẩu không đúng!')
            //                 // }
            //             }

            //         });
            //         console.log({{ session('status') }})
            //     }
            //     return false;
            // });
        });

        function apply() {
            console.log('apply');
            console.log($('#voucher').val());
            livewire.emit('total', $('#voucher').val());
            livewire.emit('refreshTotal');
        }
    </script>
@endpush
