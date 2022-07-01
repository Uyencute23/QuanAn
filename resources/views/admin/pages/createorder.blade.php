@extends('admin.layouts.admin-app')
@section('content')
    <div>
        <div class="row mt-4">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Chọn sản phẩm</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <div class="card-body p-3">
                            {{-- <div class="table-responsive"> --}}
                                {{ $dataTable->table() }}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5 mt-4">
                <div class="card h-100 mb-4">
                   @livewire('create-order')
                </div>
            </div>
        </div>
    </div>
    @push('scripts_admin')
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var editor = new $.fn.dataTable.Editor({
                    ajax: 'product',
                    table: "#product-table",
                    template: '#customForm',
                    display: 'bootstrap',
                    fields: [{
                            label: "Tên món ăn",
                            name: "name",
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
                            label: "Giá",
                            name: "price",
                            attr: {
                                type: 'number'
                            }
                        },
                        {
                            label: "Loại món ăn",
                            name: "product_type_id",
                            type: "select",
                            // placeholder: "Tên Vắc-xin",
                            options: [
                                @foreach ($type as $t)
                                    {
                                        label: "{{ $t->name }}",
                                        value: "{{ $t->id }}"
                                    },
                                @endforeach
                            ]
                        },
                        {
                            label: "Mô tả",
                            name: "description",
                            type: "textarea",

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
                
            });
            function addItem(id){
             console.log('addItem');
                Livewire.emit('additem',id)
            }
            function removeItem(id){
                console.log('removeItem');
                Livewire.emit('removeitem',id)
            }
            function minusItem(id){
                console.log('minusItem');
                Livewire.emit('minusitem',id)
            }

            //createOrder()
            function createOrder(){
                console.log('createOrder');
                //confirm alert javascript
                var r = confirm("Bạn có chắc chắn muốn tạo đơn hàng?");
                if (r == true) {
                    Livewire.emit('createorder');
                } else {
                    return;
                }
            }
        </script>

    @endpush

@endsection
