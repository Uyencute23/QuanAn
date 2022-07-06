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
    @push('scripts_admin')
        <script>
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var editor = new $.fn.dataTable.Editor({
                    ajax: 'voucher',
                    table: "#promotions-table",
                    display: 'bootstrap',
                    fields: [{
                            label: "Mã giảm giá:",
                            name: "name",
                            type: "text",

                        },
                        {
                            label: "Giá tối đa",
                            name: "max_price",
                            attr: {
                                type: "number"
                            },
                        },
                        {
                            label: "Phần trăm giảm giá",
                            name: "precent",
                            attr: {
                                type: "number"
                            },
                        },
                        {
                            label: "Thời gan bắt đầu",
                            name: "start_time",
                            type: "datetime",
                            def: function() {
                                return new Date();
                            },
                            format: 'YYYY-MM-DD HH:mm:ss',
                            opts: {
                                minutesIncrement: 5
                            }

                        },
                        {
                            label: "Thời gian kết thúc",
                            name: "end_time",
                            type: "datetime",
                            def: function() {
                                return new Date();
                            },
                            format: 'YYYY-MM-DD HH:mm:ss',
                            opts: {
                                minutesIncrement: 5
                            }
                        },
                       
                        {
                            label: "Mô tả",
                            name: "description",
                            type: "textarea",
                        },


                    ],
                    i18n: {
                        create: {
                            title: "<h4>Thêm voucher</h4>",
                            button: 'Thêm',
                            submit: 'Tạo'
                        },
                        edit: {
                            title: "<h4>Sửa thông tin</h4>",
                            button: 'Sửa',
                            submit: 'Lưu'
                        },
                        remove: {
                            title: "<h4>Xóa Voucher</h4>",
                            button: "Xóa",
                            submit: 'Xóa',
                            confirm: 'Bạn có chắc chắn muốn xóa voucher này?'
                        },
                    }
                });

                {{ $dataTable->generateScripts() }}

            });
        </script>
    @endpush
@endsection
