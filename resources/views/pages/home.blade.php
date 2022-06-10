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
    @include('layouts.menu')

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
                                Chicken Cool, Xin Chào !!!
                            </h2>
                        </div>
                        <p>
                            &emsp; Chicken Cool sẽ thiết lập một chuẩn mực mới cho ngành công nghiệp nhà hàng phục vụ thức
                            ăn nhanh
                            tại Việt Nam, mang đến cho khách hàng những trải nghiệm độc nhất chỉ có tại chuỗi nhà hàng của
                            chúng tôi. <br>

                            &emsp; Hoài bão của chúng tôi là phục vụ Thức ăn ngon cùng đội ngũ Nhân Viên Chuyên Nghiệp,Thân
                            Thiện
                            và là một Thành Viên Tốt của cộng đồng.<br>

                            &emsp; Thức ăn ngon: chúng tôi phục vụ thức ăn ngon từ nguồn nguyên vật liệu chất lượng nhất và
                            được
                            chế biến theo từng yêu cầu của khách hàng.<br>
                            Nhân viên chuyên nghiệp, thân thiện: chúng tôi luôn tạo cơ hội để nhân viên phát triển sự nghiệp
                            cùng công ty; từ đó, cùng nhau, chúng tôi phục vụ khách hàng một cách tốt nhất.<br>

                        </p>
                        <a href="">
                            Đọc Thêm
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
                    Đánh giá của khách hàng
                </h2>
            </div>
            <div class="carousel-wrap row ">
                <div class="owl-carousel client_owl-carousel">
                    <div class="item">
                        <div class="box">
                            <div class="detail-box">
                                <p>
                                    Chicken Cool thật sự tuyệt vời. Rất thích không gian của quán rộng rãi thoáng mát , các
                                    món ăn nhiều sự lựa chọn, món ăn khá độc đáo và ngon miệng . Sẽ quay lại ủng hộ quán. 
                                </p>
                                <h6>
                                    Thuý Hằng
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
                                    Chicken Cool thật sự tuyệt vời. Có rất nhiều sự lựa chọn, và chúng tôi chọn thưởng
                                    thức salad và các món rau củ khác của nhà hàng. Đồ ăn ngon lành với
                                    hương vị đặc trưng . Đội ngũ nhân viên vô cùng thân thiện.
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
