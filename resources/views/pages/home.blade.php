@extends('layouts.app')
@section('content')
    <section class="offer_section layout_padding-bottom">
        <div class="offer_container">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6  ">
                        {{-- <div class="box ">
                            <div class="img-box">
                                <img src="{{ asset('frontend/images/o1.jpg') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Tasty Thursdays
                                </h5>
                                <h6>
                                    <span>20%</span> Off
                                </h6>
                                <a href="">
                                    Order Now
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div> --}}
                        
                        <img alt="" src="https://cdn.chanhtuoi.com/uploads/2016/03/combo-g%C3%A0-gi%C3%B2n-kfc.png" style="width: 100%;" />

                    </div>
                  
                    <div class="col-md-6">
                        {{-- <div class="box ">
                            <div class="img-box">
                                <img src="{{ asset('frontend/images/o2.jpg') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Pizza Days
                                </h5>
                                <h6>
                                    <span>15%</span> Off
                                </h6>
                                <a href="">
                                    Order Now
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div> --}}
                        <img alt="" src="https://thanglon66.com/ga-ran-kfc-bao-nhieu-tien/imager_2925.jpg" style="width: 100%;" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    @livewire('menu')

    <section class="about_section layout_padding">
        <div class="container  ">

            <div class="row">
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="{{ asset('frontend/images/about-img.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Chicken Cool, Xin Ch??o !!!
                            </h2>
                        </div>
                        <p>
                            &emsp; Chicken Cool s??? thi???t l???p m???t chu???n m???c m???i cho ng??nh c??ng nghi???p nh?? h??ng ph???c v??? th???c
                            ??n nhanh
                            t???i Vi???t Nam, mang ?????n cho kh??ch h??ng nh???ng tr???i nghi???m ?????c nh???t ch??? c?? t???i chu???i nh?? h??ng c???a
                            ch??ng t??i. <br>

                            &emsp; Ho??i b??o c???a ch??ng t??i l?? ph???c v??? Th???c ??n ngon c??ng ?????i ng?? Nh??n Vi??n Chuy??n Nghi???p,Th??n
                            Thi???n
                            v?? l?? m???t Th??nh Vi??n T???t c???a c???ng ?????ng.<br>

                            &emsp; Th???c ??n ngon: ch??ng t??i ph???c v??? th???c ??n ngon t??? ngu???n nguy??n v???t li???u ch???t l?????ng nh???t v??
                            ???????c
                            ch??? bi???n theo t???ng y??u c???u c???a kh??ch h??ng.<br>
                            Nh??n vi??n chuy??n nghi???p, th??n thi???n: ch??ng t??i lu??n t???o c?? h???i ????? nh??n vi??n ph??t tri???n s??? nghi???p
                            c??ng c??ng ty; t??? ????, c??ng nhau, ch??ng t??i ph???c v??? kh??ch h??ng m???t c??ch t???t nh???t.<br>

                        </p>
                        <a href="">
                            ?????c Th??m
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="client_section layout_padding-bottom mt-5">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h2>
                    ????nh gi?? c???a kh??ch h??ng
                </h2>
            </div>
            <div class="carousel-wrap row ">
                <div class="owl-carousel client_owl-carousel">
                    <div class="item">
                        <div class="box">
                            <div class="detail-box">
                                <p>
                                    Chicken Cool th???t s??? tuy???t v???i. R???t th??ch kh??ng gian c???a qu??n r???ng r??i tho??ng m??t , c??c
                                    m??n ??n nhi???u s??? l???a ch???n, m??n ??n kh?? ?????c ????o v?? ngon mi???ng . S??? quay l???i ???ng h??? qu??n. 
                                </p>
                                <h6>
                                    Thu?? H???ng
                                </h6>

                            </div>
                            <div class="img-box">
                                <img src="{{ asset('frontend/images/client1.jpg') }}" alt="" class="box-img">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="detail-box">
                                <p>
                                    Chicken Cool th???t s??? tuy???t v???i. C?? r???t nhi???u s??? l???a ch???n, v?? ch??ng t??i ch???n th?????ng
                                    th???c salad v?? c??c m??n rau c??? kh??c c???a nh?? h??ng. ????? ??n ngon l??nh v???i
                                    h????ng v??? ?????c tr??ng . ?????i ng?? nh??n vi??n v?? c??ng th??n thi???n.
                                </p>
                                <h6>
                                    Long Long
                                </h6>
                                
                            </div>
                            <div class="img-box">
                                <img src="{{ asset('frontend/images/client2.jpg') }}" alt="" class="box-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
