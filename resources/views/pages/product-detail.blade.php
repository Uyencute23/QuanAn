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
                                    style="max-width: 45px;text-align: center;" value="1" min="1"
                                    max="100">
                                <span>
                                    <button type="button" class="btn btn-danger btn-number"
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
            <h4 class="text-center font-weight-bold">ĐÁNH GIÁ</h4>
            <hr>
            <!-- Product tab -->
            <div class="row mb-5">
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <div class="row">
                            <!-- Reviews -->
                            <div class="col">
                                <div id="reviews">
                                    @if (isset($rating) && $rating->count() > 0)
                                        @foreach ($rating as $rate)
                                            <div class="review">
                                                <div class="row review-author">
                                                    <div class="col-2 p-0">
                                                        <img class="avatar" width="90px" height="90px"
                                                            style="object-fit: cover;"
                                                            src="@if ($rate->customer->img != '') {{ $rate->customer->img }}
                                                            @else
                                                            https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png
                                                            @endif"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <h5>{{ $rate->customer->user->name }}</h5>
                                                        <span class="font-weight-lights" style="font-size: 13px">{{ $rate->created_at->format('d/m/Y H:i:s') }}</span>
                                                        <div >
                                                            @for ($i = 0; $i < $rate->rating; $i++)
                                                                <i class="fa fa-star" style="color: #ffc107;"></i>
                                                            @endfor
                                                            @for ($i = 0; $i < 5 - $rate->rating; $i++)
                                                                <i class="fa fa-star" style="color: #ccc;"></i>
                                                            @endfor
                                                            {{-- <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i> --}}
                                                        </div>
                                                        <p>{{ $rate->content }}</p>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    @else
                                        <p>Chưa có đánh giá nào!!</p>
                                    @endif

                                </div>
                            </div>
                            <!-- /Reviews -->
                            <!-- Review Form -->
                            <div class="col">
                                <div id="review-form">
                                    <form class="review-form">
                                        {{-- <input class="input" type="text" placeholder="Họ và Tên">
                                        <input class="input" type="email" placeholder="Email"> --}}
                                        @if (Auth::user())
                                        <h5>Họ và tên: {{Auth::user()->name}}</h5>
                                        <h5>Email: {{Auth::user()->email}}</h5>
                                        @endif
                                        <textarea class="input" name="content" placeholder="Đánh giá của bạn"  rows="7" ></textarea>
                                        <div class="input-rating mb-3">
                                            <span>Xếp hạng của bạn: </span>
                                            <div class="stars">                                             
                                                <input id="star5" name="rating" value="5"
                                                    type="radio"><label for="star5"></label>
                                                <input id="star4" name="rating" value="4"
                                                    type="radio"><label for="star4"></label>
                                                <input id="star3" name="rating" value="3"
                                                    type="radio"><label for="star3"></label>
                                                <input id="star2" name="rating" value="2"
                                                    type="radio"><label for="star2"></label>
                                                <input id="star1" name="rating" value="1"
                                                    type="radio"><label for="star1"></label>
                                            </div>
                                        </div>
                                        <a style="color: #fff" type="button" 
                                        @if (!Auth::user()) data-toggle="modal" data-target="#loginModal" @endif 
                                        @if(Auth::user() && Auth::user()->role_id !=9)
                                          onclick="submitRating({{Auth::user()->info->id}})"
                                        @endif 
                                          class="primary-btn">Gửi đánh giá</a>

                                    </form>
                                </div>
                            </div>
                            <!-- /Review Form -->

                        </div>
                    </div>
                    <!-- /product tab content  -->
                </div>
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
                                if (data.success) {
                                    Livewire.emit('refreshNavbar')
                                    alert('Thêm thành công')
                                }
                                console.log(data)
                            }
                        });
                    }
                }
                //submit rating
                 function submitRating($id) {
                   if( $('input[name=rating]:checked').val() > 0)
                   {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('product.rating') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            product_id: '{{ $product->id }}',
                            customer_id:  $id,
                            rating: $('input[name=rating]:checked').val(),
                            content: $('textarea[name=content]').val()
                        },
                        success: function(data) {
                            if (data.success) {
                                alert('Gửi đánh giá thành công')
                                //reload page
                                location.reload();
                            }
                            console.log(data)
                        },
                        error: function(data) {
                            console.log(data)
                            console.log(data.responseJSON.message)
                            if(data.status == 422)
                            {
                                alert('Vui lòng nhập đầy đủ thông tin')
                            }
                            else if(data.status == 400)
                            {
                                alert(data.responseJSON.message)
                            }
                            else
                            {
                                alert('Gửi đánh giá thất bại')
                            }
                        }
                    });
                   }
                   else
                   {
                    alert('Bạn chưa đánh giá sao')
                   }
                }
            </script>
        @endpush
    @endif
@endsection
