@extends('layouts.app')
@section('content')
    <style>
        h2 {
            font-family: Segoe UI, Verdana, sans-serif;
            font-size: 20px;
        }
    </style>
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row-12">
               @livewire('cart-details')
            </div>
            <div class="row mt-4 d-flex align-items-center">
                <div class="col-sm-6 order-md-2 text-right">
                    <a href="{{ route('checkout')}}" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">THANH TOÁN</a>
                </div>
                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                    <a href="{{ route('menu') }}">
                        <i class="fas fa-arrow-left mr-2"></i> QUAY VỀ THỰC ĐƠN</a>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    <script>
       
    </script>
@endpush
@endsection
