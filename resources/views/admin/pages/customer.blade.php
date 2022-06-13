@extends('admin.layouts.admin-app')
@section('content')
    <style>
        .col-lg-8 {
            width: 100%;
        }
    </style>
    <div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        {{-- <a id="lfm" data-input="DTE_Field_img" data-preview="holder" class="btn btn-primary text-white"> <i class="fas fa-image"></i> Choose </a> --}}
                        <h5>Quản lý khách hàng</h5>
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
        <script>
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var editor = new $.fn.dataTable.Editor({
                    ajax: 'customer',
                    table: "#customer-table",
                    display: 'bootstrap',
                    fields: [{
                            label: "Số điện thoại",
                            name: "phone",
                            type: "text",

                        },
                        {
                            label: "Hình ảnh",
                            name: "img",
                            type: "text",
                            // clearText: "Hủy bỏ",
                            // noImageText: 'Không có hình ảnh',
                        },
                        {
                            label: "Địa chỉ",
                            name: "address",
                        },
                        // {
                        //     label: "Nhập lại mật khẩu",
                        //     name: "password_confirmation",
                        // },
                        // {
                        //     label: "Ngày bắt đầu",
                        //     name: "date_time",
                        //     type: "datetime",
                        //     def: function() {
                        //         return new Date();
                        //     },
                        //     format: 'YYYY-MM-DD HH:mm:ss',
                        //     opts: {
                        //         minutesIncrement: 5
                        //     }

                        // }
                    ],
                    i18n: {
                        create: {
                            title: "<h4>Thêm người dùng</h4>",
                            button: 'Thêm',
                            submit: 'Tạo người dùng'
                        },
                        edit: {
                            title: "<h4>Sửa thông tin</h4>",
                            button: 'Sửa',
                            submit: 'Lưu'
                        },
                        remove: {
                            title: "<h4>Xóa người dùng</h4>",
                            button: "Xóa",
                            submit: 'Xóa',
                            confirm: 'Bạn có chắc chắn muốn xóa người dùng này?'
                        },
                      
                    }
                });
                // $('#schedule-table').on('click', 'tbody td:not(:first-child)', function(e) {
                //     editor.inline(this);
                // });
                {{ $dataTable->generateScripts() }}
                $('<a id="lfm" data-input="DTE_Field_img" data-preview="holder" class="lfm btn btn-primary text-white" onclick="lfm()"> <i class="fas fa-image"></i>Chọn ảnh</a>')
                    .insertBefore(
                        editor.field('img').input()
                    );

            });
           
            function lfm() {

                $('#lfm').filemanager('image');

            }
        </script>
    @endpush
@endsection
