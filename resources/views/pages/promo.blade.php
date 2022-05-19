@extends('layouts.app')
@section('content')
    <section class="container" >
        <br>
        <h1 style="text-align: center">Khuyến mãi giành cho mọi người </h1>

        <div class="row">

            @foreach ($promos as $promo)
                <div class="col-lg-6">
                    <div class="row" style="margin-top: 10px">
                        <article class="card fl-left">
                            <section class="date-time">
                                <time class="time"datetime="23th feb">
                                    <span>{{ $promo->precent }}%</span>
                                </time>
                            </section>
                            <section class="card-cont">
                                <h6>{{ $promo->name }}</h6>
                                <div class="even-date">
                                    <i class="fa fa-calendar"></i>
                                    <time>
                                        <span>{{ $promo->start_time }}</span>
                                        <span>{{ $promo->end_time }}</span>
                                    </time>
                                </div>
                                <div class="even-info">
                                    <i class="fa fa-map-marker"></i>
                                    <p>
                                        {{ $promo->description }}
                                    </p>
                                </div>
                                <a href="#">Chi tiết</a>
                            </section>
                        </article>
                    </div>
                </div>
            @endforeach

        </div>

    </section>
    <br><br>
@endsection
