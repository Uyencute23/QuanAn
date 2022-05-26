@extends('layouts.app')
@section('content')

<section class="pt-5 pb-5">
    <div class="container">
      <div class="row w-100">
          <div class="col-lg-12 col-md-12 col-12">
              <h3 class="display-5 mb-2 text-center">Giỏ hàng</h3>
              <p class="mb-5 text-center">
                Bạn có <span class="text-info font-weight-bold">{{count($detais)}} </span>Sản phẩm có trong giỏ</p>
              <table id="shoppingCart" class="table table-condensed table-responsive">
                  <thead>
                      <tr>
                          <th style="width:60%">Product</th>
                          <th style="width:12%">Price</th>
                          <th style="width:10%">Quantity</th>
                          <th style="width:16%"></th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ( $detais as $detail )
                      <tr>
                          <td data-th="Product">
                              <div class="row">
                                  <div class="col-md-3 text-left">
                                      <img src="{{$detail->product->img}}" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                  </div>
                                  <div class="col-md-9 text-left mt-sm-2">
                                      <h4>{{$detail->product->name}}</h4>
                                      {{-- <p class="font-weight-light">Brand &amp; Name</p> --}}
                                  </div>
                              </div>
                          </td>
                          <td data-th="Price" class="h3">{{ number_format($detail->product->price, 0, ',', '.') }}đ</td>
                          <td data-th="Quantity">
                              <input type="number" class="form-control form-control-lg text-center" value="1">
                          </td>
                          <td class="actions" data-th="">
                              <div class="text-right">
                                  <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                      <i class="fas fa-sync"></i>
                                  </button>
                                  <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                      <i class="fas fa-trash"></i>
                                  </button>
                              </div>
                          </td>
                      </tr>
                     @endforeach
                  </tbody>
              </table>
              <div class="float-right text-right">
                  <h4>Tổng tiền:</h4>
                  <h1>{{ number_format($cart->total, 0, ',', '.') }}đ</h1>
              </div>
          </div>
      </div>
      <div class="row mt-4 d-flex align-items-center">
          <div class="col-sm-6 order-md-2 text-right">
              <a href="catalog.html" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Checkout</a>
          </div>
          <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
              <a href="catalog.html">
                  <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
          </div>
      </div>
  </div>
  </section>

@endsection