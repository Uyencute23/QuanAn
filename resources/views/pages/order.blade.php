@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="card mt-5 mb-5">
            {{-- <img class="card-img-top" src="holder.js/100px180/" alt=""> --}}
            <div class="card-body">
                <h4 class="card-title">Tất cả đơn hàng</h4>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
