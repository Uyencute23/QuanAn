@extends('admin.layouts.admin-app')
@section('content')
    <div>
        {{-- <br><br>
        <div class="container">
            <div class="row ">
                <div>
                    <h3 class="text-center">
                        QUẢN LÝ NHÂN VIÊN
                    </h3>
                    <div class="form_container ">
                        <form style="color:black">
                            <b><label for="fname">Tên món ăn</label></b>
                            <input type="text" class="form-control" />
                            <b><label for="fname">Loại sản phẩm</label></b>
                            <input type="text" class="form-control" />
                            <b><label for="fname">Giá tiền</label></b>
                            <input type="email" class="form-control" />

                            <b><label for="fname">Hình ảnh</label></b><br>
                            <input type="text" class="form-control" />

                            <b><label for="fname">Mô tả</label></b>
                            <textarea name="textarea" rows="4" cols="125" placeholder="Vui lòng nhập mô tả"></textarea>
                            <div class="col-12">
                                <button type="submit" class="btn btn-warning">Thêm sản phẩm</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
            <div class="col-12">
              <div class="form-outline">
                <input type="text" id="form1" class="form-control" />
                          </div>
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-warning">Tìm kiếm</button>
            </div>
          </form>
        <section class="vh-100 gradient-custom-2">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-xl-10">
          
                  <div class="card mask-custom">
                    <div class="card-body p-4 text-white"> --}}
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">

                        Dash board
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('scripts_admin')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
