<section class="food_section layout_padding-bottom mt-5">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
               THỰC ĐƠN
            </h2>
        </div>

        <ul class="filters_menu">
            <li class="active" data-filter="*">All</li>
            @foreach ($types as $type)
                <li data-filter=".{{ $type->id }}">{{ $type->name }}</li>
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
                                        <a onclick="addProduct({{ $prod->id }})">
                                            <i class="fa fa-shopping-cart" style="color: white" aria-hidden="true"></i>
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
        <div class="btn-box">
            <a href="">
                Xem thêm
            </a>
        </div>
    </div>
    @push('scripts')
        <script>
            function addProduct(id) {
                // console.log('hihi');
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
                            alert('Thêm thành công')
                        }
                        console.log(data)
                    }
                });

            }
        </script>
    @endpush
</section>
