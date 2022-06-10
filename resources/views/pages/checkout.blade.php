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
        <div class="row cart-body">


            <div class="col-lg-5">
                <!--SHIPPING METHOD-->
                <div class="panel panel-info">
                    <div class="panel-heading">THÔNG TIN GIAO HÀNG</div>
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
                        <div class="form-group">
                            <div class="col-md-6 col-xs-12">
                                <strong>Họ:</strong>
                                <input type="text" name="first_name" class="form-control" value="" />
                            </div>
                            <div class="span1"></div>
                            <div class="col-md-6 col-xs-12">
                                <strong>Tên:</strong>
                                <input type="text" name="last_name" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Địa Chỉ:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="address" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Thành Phố:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="city" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Trạng thái:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="state" class="form-control" value="Đang giao hàng" disabled />
                            </div>
                        </div>
                        {{-- <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="" />
                                </div>
                            </div> --}}
                        <div class="form-group">
                            <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                            <div class="col-md-12"><input type="text" name="phone_number" class="form-control"
                                    value="" /></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Email:</strong></div>
                            <div class="col-md-12"><input type="text" name="email_address" class="form-control"
                                    value="" /></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Ghi chú:</strong></div>
                            <div class="col-md-12"><input type="text" name="email_address" class="form-control"
                                    value="" /></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Hình thức giao hàng:</strong></div>
                            <div class="col-md-12">
                                <select id="CreditCardType" name="CreditCardType" class="form-control">
                                    <option value="5">Thanh toán bằng tiền mặt</option>
                                    <option value="6">Thanh toán bằng thẻ ngân hàng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!--SHIPPING METHOD END-->
                <!--CREDIT CART PAYMENT-->
                {{-- <div class="panel panel-info">
                    <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> PHƯƠNG THỨC THANH
                        TOÁN</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12"><strong>Card Type:</strong></div>
                            <div class="col-md-12">
                                <select id="CreditCardType" name="CreditCardType" class="form-control">
                                    <option value="5">Visa</option>
                                    <option value="6">MasterCard</option>
                                    <option value="7">American Express</option>
                                    <option value="8">Discover</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                            <div class="col-md-12"><input type="text" class="form-control" name="car_number"
                                    value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Card CVV:</strong></div>
                            <div class="col-md-12"><input type="text" class="form-control" name="car_code"
                                    value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>Expiration Date</strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="">
                                    <option value="">Month</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="">
                                    <option value="">Year</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span>Pay secure using your credit card.</span>
                            </div>
                            <div class="col-md-12">
                                <ul class="cards">
                                    <li class="visa hand">Visa</li>
                                    <li class="mastercard hand">MasterCard</li>
                                    <li class="amex hand">Amex</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!--CREDIT CART PAYMENT END-->
            </div>
            <div class="col-lg-7">
                <!--REVIEW ORDER-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        THÔNG TIN SẢN PHẨM <div class="pull-right"><small><a class="afix-1" href="#">Edit
                                    Cart</a></small></div>
                    </div>
                    <div class="panel-body">
                        @foreach ($detais as $detail)
                            <div class="row">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{{ $detail->product->img }}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">
                                        <h4 class="font-weight-bold">{{ $detail->product->name }}</h4>
                                    </div>
                                    <div class="col-xs-12 h4">Số
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
                    <div class="row">
                        <div class="col-7">
                            <div class="row p-3 ml-3">
                                <div class="col-3">
                                    <p class='h5 font-weight-bold'>Voucher:</p>
                                </div>
                                <div class="col-8">
                                    <select id="CreditCardType" name="CreditCardType" class="form-control">
                                        @foreach ($promo as $p)
                                            <option value="{{ $p->id }}">
                                                {{ mb_strimwidth($p->name, 0, 50, '...') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-xs-12">
                                <h4> <b> Tổng Tiền:</b> {{ number_format($cart->total, 0, ',', '.') }}đ</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="text-align: center;background:">


                    <div class="col"> <button class="btc">TIẾP TỤC MUA HÀNG</button></div>
                    <div class="col"> <button class="btc">ĐẶT HÀNG </button></div>
                </div>
                <!--REVIEW ORDER END-->
            </div>
        </div>
    </div>
@endsection
