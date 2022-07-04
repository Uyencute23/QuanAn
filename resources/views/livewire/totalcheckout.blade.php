<div>
    <div class="row mb-2">
        <div class="col-md">
        <span class="text-danger">{{$error}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md">

            <span class="text-secondary"> Lưu ý: Mỗi đơn hàng chỉ áp dụng được 1 voucher!</span>
            <br>
            {{-- <h6 class=' font-weight-bold'>Voucher:</h6>
            <div class="row input-group p-3 ml-3">
                <input class="ml-2 form-control"  name="promo_id"
                    style="width: 130px; border:1px solid;border-radius: 5px" type="text">
                <div class="input-group-append">
                    <button class="btn btn-primary" style="border-radius: 5px" >Áp
                        dụng</button>
                </div>

            </div> --}}

        </div>
        <div class="col-md-6 p-0">
            <h6 class="text-right"> <span class="font-weight-bold"> Sản phẩm:</span>
                <strong > {{ number_format( $total, 0, ',', '.'); }}đ</strong>
            </h6>
            <h6 class="text-right"> <span class="font-weight-bold"> Phí ship:</span>
                <strong style=""> 15.000đ</strong>
            </h6>
            
            <h4 class="text-right"> <span class="font-weight-bold"> Thành Tiền:</span>
                <strong style="font-size: 28px;color:rgb(212, 4, 4)"> {{ number_format($total + 15000, 0, ',', '.');}}đ</strong>
            </h4>
        </div>
        
    </div>
   
</div>
