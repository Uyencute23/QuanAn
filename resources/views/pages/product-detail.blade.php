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
               <!-- Product tab -->
               <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
                        <!-- <li><a data-toggle="tab" href="#tab2">Chi tiết</a></li> -->
                        <li><a data-toggle="tab" href="#tab3">Đánh giá (3)</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                {{-- <div class="col-md-12">
                                    {!! $product->descrip!!}
                                </div> --}}
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <!-- <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Trần đời này có bao nhiêu sự cute hình như đều được đặt hết vào team quả bơ này rùi í các cậu ạ, tất thảy mọi đồ dùng mà có thêm hình những em bơ chinh chinh nhỏ nhắn này là muốn ôm hết về nhà lun. Cùng đắm chìm trong màu xanh xanh cute thích mê này nào các cậu </p>
                                </div>
                            </div>
                        </div> -->
                        <!-- /tab2  -->

                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            {{-- <span>{{number_format($product->rating,1)}}</span>

                                            <div class="rating-stars">
                                                {{ratingStar($product->rating)}}
                                                <!-- <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fas fa-star-half-alt"></i> -->
                                            </div> --}}
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 80%;"></div>
                                                </div>
                                                <span class="sum">3</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 60%;"></div>
                                                </div>
                                                <span class="sum">2</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="reviews-pagination">
                                            <li class="active">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <div class="col-md-3">
                                    <div id="review-form">
                                        <form class="review-form">
                                            <input class="input" type="text" placeholder="Họ và Tên">
                                            <input class="input" type="email" placeholder="Email">
                                            <textarea class="input" placeholder="Đánh giá của bạn"></textarea>
                                            <div class="input-rating">
                                                <span>Xếp hạng của bạn: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <button class="primary-btn">Gửi đánh giá</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
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
