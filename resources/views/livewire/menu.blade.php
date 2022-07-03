<div>
    <style>
        .loadersmall {
            border: 5px solid #f3f3f3;
            -webkit-animation: spin 1s linear infinite;
            /* Safari */
            animation: spin 1s linear infinite;
            border-top: 5px solid #555;
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <section class="food_section layout_padding-bottom mt-5">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    THỰC ĐƠN
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="@if($type_p==0) active @endif" data-filter="*">All</li>
                @foreach ($types as $type)
                    <li class="@if($type_p== $type->id) active @endif" wire:click="updateType({{ $type->id }})">{{ $type->name }} </li>
                @endforeach
                {{-- <li data-filter=".pizza"></li>
            <li data-filter=".pasta">Pasta</li>
            <li data-filter=".fries">Fries</li> --}}
            </ul>

            <div class="filters-content">
                <div class="row grid">
                    @foreach ($prods as $prod)
                        <div class="col-sm-4 col-lg-4 all {{ $prod->product_type_id }}">
                            <div class="box ">
                                <div>
                                    <a href="{{ route('product-detail', ['id' => $prod->id]) }}">
                                        <div class="img-box">
                                            <img src="{{ $prod->img }}" alt="">
                                        </div>
                                    </a>
                                    <div class="detail-box">
                                        <a href="{{ route('product-detail', ['id' => $prod->id]) }}">
                                            <h5>
                                                {{ mb_strimwidth($prod->name, 0, 25, '...') }}
                                            </h5>
                                        </a>
                                        <p>
                                            {{ mb_strimwidth($prod->description, 0, 100, '...') }}
                                        </p>
                                        <div class="options">
                                            <h6>
                                                {{ number_format($prod->price, 0, ',', '.') }}đ

                                            </h6>
                                            <a @if (!Auth::user()) data-toggle="modal" data-target="#loginModal" @endif
                                                onclick="addProduct({{ $prod->id }})">
                                                <i class="fa fa-shopping-cart" style="color: white"
                                                    aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    @endforeach

                </div>
            </div>
            {{-- div align center --}}
            <div class="d-flex justify-content-center">
                <div class="loader " wire:loading>
                    <div class="loadersmall"></div>
                   
                </div>
                <span class="mt-3">{{$message}}</span>
            </div>
            <div class="btn-box">
                <a wire:click="loadMore">
                    Xem thêm
                </a>
            </div>
        </div>
        @push('scripts')
            <script>
                function addProduct(id) {

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('product.add') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            product_id: id,
                            quantity: 1
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
            </script>
        @endpush
    </section>

</div>
