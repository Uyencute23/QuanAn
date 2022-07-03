@extends('layouts.app')
@section('content')
    <style>
        .steps .step {
            display: block;
            width: 100%;
            margin-bottom: 35px;
            text-align: center
        }

        .steps .step .step-icon-wrap {
            display: block;
            position: relative;
            width: 100%;
            height: 40px;
            text-align: center
        }

        .steps .step .step-icon-wrap::before,
        .steps .step .step-icon-wrap::after {
            display: block;
            position: absolute;
            top: 50%;
            width: 50%;
            height: 3px;
            margin-top: -1px;
            background-color: #e1e7ec;
            content: '';
            z-index: 1
        }

        .steps .step .step-icon-wrap::before {
            left: 0
        }

        .steps .step .step-icon-wrap::after {
            right: 0
        }

        .steps .step .step-icon {
            display: inline-block;
            position: relative;
            width: 40px;
            height: 40px;
            border: 1px solid #e1e7ec;
            border-radius: 50%;
            background-color: #f5f5f5;
            color: #374250;
            font-size: 15px;
            line-height: 40px;
            z-index: 5
        }

        .steps .step .step-title {
            margin-top: 16px;
            margin-bottom: 0;
            color: #606975;
            font-size: 14px;
            font-weight: 500
        }

        .steps .step:first-child .step-icon-wrap::before {
            display: none
        }

        .steps .step:last-child .step-icon-wrap::after {
            display: none
        }

        .steps .step.completed .step-icon-wrap::before,
        .steps .step.completed .step-icon-wrap::after {
            background-color: #0da9ef
        }

        .steps .step.completed .step-icon {
            border-color: #0da9ef;
            background-color: #0da9ef;
            color: #fff
        }

        @media (max-width: 576px) {

            .flex-sm-nowrap .step .step-icon-wrap::before,
            .flex-sm-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 768px) {

            .flex-md-nowrap .step .step-icon-wrap::before,
            .flex-md-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 991px) {

            .flex-lg-nowrap .step .step-icon-wrap::before,
            .flex-lg-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 1200px) {

            .flex-xl-nowrap .step .step-icon-wrap::before,
            .flex-xl-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        .bg-faded,
        .bg-secondary {
            background-color: #f5f5f5 !important;
        }
    </style>

    <div class="container d-flex justify-content-center padding-bottom-3x mb-1">
        <div class="card mb-3">
            <div class="card-body">
                <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Theo dõi đơn
                        hàng
                        - </span><span class="text-medium">{{$order->id}}</span></div>

                @livewire('tracking', ['orderid' => $order->id])

                <div class="row text-dark">
                    <div class="col">
                        <!--REVIEW ORDER-->
                        <div class="panel panel-info">
                            <h3 class="text-center mb-3">THÔNG TIN SẢN PHẨM</h3>
                            <hr>
                            <div class="panel-body">
                                @foreach ($orderDetails as $detail)
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive" src="{{ $detail->product->img }}" />
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12">
                                                <h5 class="font-weight-bold">{{ $detail->product->name }}</h5>
                                            </div>
                                            <div class="col-xs-12 ">Số
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
                                <div class="col p-0 mr-3">
                                    <h4 class="text-right"> <span class="font-weight-bold "> Tổng hóa đơn:</span>
                                        <strong style="font-size: 28px;color:rgb(212, 4, 4)">
                                            {{ number_format($order->total, 0, ',', '.') }}đ</strong>
                                    </h4>
                                </div>

                            </div>

                        </div>
                        <!--REVIEW ORDER END-->
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
