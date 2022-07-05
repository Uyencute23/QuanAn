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
                <div data-editor-template="name"></div>
            </fieldset>

            <fieldset>
                <div class="input-group mb-3">
                    <div class="col" data-editor-template="img"></div>
                    <div class="input-group-append">
                        <button id="lfm" style="width: 120px; height: 40px; margin-top: 40px"
                            data-input="DTE_Field_img" data-preview="holder" class="lfm btn btn-secondary text-white"> <i
                                class="fas fa-image "></i>Chọn
                            ảnh</button>
                    </div>
                </div>
                <div id="holder" style="margin-top:15px;max-height:200px;display: none"><img style="height: 12rem;">
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
                    ajax: 'product-type',
                    table: "#producttype-table",
                    template: '#customForm',
                    display: 'bootstrap',
                    fields: [{
                            label: "Tên danh mục",
                            name: "name",
                            type: "text",

                        },
                        {
                            label: "Hình ảnh",
                            name: "img",
                            type: "text",
                        
                        },
                       
                        {
                            label: "Mô tả",
                            name: "description",
                            type: "textarea",

                        },
                       
                    ],
                    i18n: {
                        create: {
                            title: "<h4>Thêm Món ăn</h4>",
                            button: 'Thêm',
                            submit: 'Tạo người dùng'
                        },
                        edit: {
                            title: "<h4>Sửa thông tin</h4>",
                            button: 'Sửa',
                            submit: 'Lưu',
                            className: "btn btn-primary"
                        },
                        remove: {
                            title: "<h4>Xóa món ăn</h4>",
                            button: "Xóa",
                            submit: 'Xóa',
                            confirm: 'Bạn có chắc chắn muốn xóa món này?'
                        },

                    }
                });

                {{ $dataTable->generateScripts() }}
                setImgHolder(editor)

            });


               

        </script>
    @endpush
@endsection
