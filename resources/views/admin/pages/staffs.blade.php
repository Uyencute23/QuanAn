@extends('admin.layouts.admin-app')
@section('content')

    <div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <h5>{{$title}}</h5>
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
    <div style="display: none">
        <div id="customForm">
            <fieldset>
                <div data-editor-template="user.name"></div>
            </fieldset>
            <fieldset>
                <div data-editor-template="user.email"></div>
            </fieldset>
            <fieldset>
                <div data-editor-template="phone"></div>
            </fieldset>

            <fieldset>
                <label data-dte-e="label" class="col-lg-4 col-form-label" for="DTE_Field_img">Hình ảnh:
                    <div data-dte-e="msg-label" class="DTE_Label_Info"></div>
                </label>
                <div class="row btn-lfm">
                    <div class="col-3">
                        <a id="lfm" style="width: 120px; height: 40px;" data-input="DTE_Field_img"
                            data-preview="holder" class="lfm btn btn-primary text-white"> <i class="fas fa-image"></i>Chọn
                            ảnh</a>
                    </div>
                    <div class="col" data-editor-template="img"></div>
                    <div id="holder" style="margin-top:15px;max-height:200px;display: none"><img style="height: 12rem;">
                    </div>
                </div>
            </fieldset>
            <fieldset class="hr">
                <div data-editor-template="description"></div>
            </fieldset>
        </div>
    </div>
    @push('scripts_admin')
        <script>
            $(function() {
                $('#lfm').filemanager('image');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var editor = new $.fn.dataTable.Editor({
                    ajax: 'staff',
                    table: "#staff-table",
                    template: '#customForm',
                    display: 'bootstrap',
                    fields: [
                        {
                            label: "Họ và tên",
                            name: "user.name",
                        },
                        {
                            label: "Email",
                            name: "user.email",
                        },
                        {
                            label: "Số điện thoại",
                            name: "phone",
                            type: "text",

                        },
                        {
                            label: "Hình ảnh",
                            name: "img",
                            type: "text",
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
                setImgHolder(editor)

            });
           
          
        </script>
    @endpush
@endsection
