@extends('admin.layouts.admin-app')
@section('content')
    <div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <strong>Top 10 sản phẩm bán chạy nhất</strong>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table align-items-center ">
                                <thead class="thead-light text-center">
                                    <tr>
                                        <th scope="col">Top</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Số lượng bán</th>
                                        <th scope="col">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($top10 as $key => $prod)
                                        <tr>
                                            <td class="align-middle text-sm">
                                                <div class="col text-center">
                                                    <h6 class="text-sm mb-0">{{ $key + 1 }}</h6>
                                                </div>
                                            </td>
                                            <td class="w-30">
                                                <div class="d-flex px-2 py-1 align-items-center">
                                                    <div class="row ms-4">
                                                        {{-- image --}}
                                                        <div class="col"><img src="{{ $prod->product->img }}"
                                                                alt="{{ $prod->product->name }}" class="img-fluid"
                                                                width="50px" height="50px"></div>
                                                        <div class="col">
                                                            <h6 class="text-sm mb-0">{{ $prod->product->name }}</h6>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">

                                                    <h6 class="text-sm mb-0">{{ $prod->quantity }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">

                                                    <h6 class="text-sm mb-0">
                                                        {{ number_format($prod->total, 0, ',', '.') }}đ</h6>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
