@extends('admin.layouts.admin-app')
@section('content')
    <div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">

                        <h5>{{ $title }}</h5>
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
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var editor = new $.fn.dataTable.Editor({
                    ajax: 'order',
                    table: "#orders-table",
                    display: 'bootstrap',
                    // template: '#customForm',
                    fields: [{
                            label: "Tên khách hàng:",
                            name: "customer_id",
                            type: "select",
                            "options": [
                                @foreach ($customers as $customer)
                                    {
                                        "label": "{{ $customer->user->name }}",
                                        "value": "{{ $customer->id }}"
                                    },
                                @endforeach

                            ]

                        },
                        {
                            label: "Mã giảm giá",
                            name: "promo_id",
                            type: "select",
                            "options": [{
                                    "label": "Không",
                                    "value": null
                                },
                                @foreach ($promotions as $promotion)
                                    {
                                        "label": "{{ $promotion->name }}",
                                        "value": "{{ $promotion->id }}"
                                    },
                                @endforeach

                            ]
                        },
                        {
                            label: "Phí vận chuyển",
                            name: "shippingfee",
                            attr: {
                                type: 'number'
                            }
                        },
                        {
                            label: "Thời gian giao hàng",
                            name: "delivery_time",
                            attr: {
                                type: 'number'
                            }
                        },
                        {
                            label: "Trạng thái",
                            name: "status",
                            type: "select",
                            "options": [{
                                    "label": "Đang chờ xác nhận",
                                    "value": "Đang chờ xác nhận"
                                },
                                {
                                    "label": "Đã xác nhận",
                                    "value": "Đã xác nhận"
                                },
                                {
                                    "label": "Đang chuẩn bị đơn hàng",
                                    "value": "Đang chuẩn bị đơn hàng"
                                },
                                {
                                    "label": "Đang giao hàng",
                                    "value": "Đang giao hàng"
                                },
                                {
                                    "label": "Đã giao hàng",
                                    "value": "Đã giao hàng"
                                },
                                {
                                    "label": "Đã nhận được hàng",
                                    "value": "Đã nhận được hàng"
                                },
                                {
                                    "label": "Đã hủy",
                                    "value": "Đã hủy"
                                },

                            ]
                        },
                        {
                            label: "Tổng tiền",
                            name: "total",
                            attr: {
                                type: 'number'
                            }
                        }
                    ],
                    i18n: {
                        create: {
                            title: "<h4>Thêm người dùng</h4>",
                            button: 'Thêm',
                            submit: 'Tạo người dùng'
                        },
                        edit: {
                            title: "<h4>Sửa thông tin</h4>",
                            button: 'Cập nhật',
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
                editor.on('initEdit', function() {
                    editor.show(); //Shows all fields
                    editor.disable('customer_id');
                    editor.disable('promo_id');
                    editor.disable('shippingfee');
                    editor.disable('promo_id');
                    editor.disable('customer_id');
                    editor.disable('total');
                });
                // $('#schedule-table').on('click', 'tbody td:not(:first-child)', function(e) {
                //     editor.inline(this);
                // });
                {{ $dataTable->generateScripts() }}

            });
        </script>
    @endpush
@endsection
