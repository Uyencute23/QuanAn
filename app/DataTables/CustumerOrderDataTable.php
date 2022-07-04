<?php

namespace App\DataTables;

use App\Models\CustumerOrder;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustumerOrderDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query->where('customer_id', Auth::user()->customer->id))
            ->setrowId('id')
            ->addColumn('c_shippingfee', function ($order) {
                return number_format($order->shippingfee, 0, ',', '.') . 'đ';
            })
            ->addColumn('c_total', function ($order) {
                return number_format($order->total, 0, ',', '.') . 'đ';
            })
            ->addColumn('p_total', function ($order) {
                return number_format($order->total + $order->shippingfee , 0, ',', '.') . 'đ';
            })
            ->editColumn('delivery_time', function ($order) {
                return $order->delivery_time . ' phút';
            })
            ->addColumn('user', function ($order) {
                return  $order->customer->user->name;
            })
            ->addColumn('promo_name', function ($order) {
                if ($order->promo_id) {
                    return $order->promo->name;
                } else {
                    return 'Không';
                }
            })
            ->addColumn('details', function ($order) {
                return '<a href="' . route('order-detail', $order->id) . '" class="btn btn-primary btn-sm" style="width:80px">Chi tiết</a>';
            })
            ->editColumn('created_at', function ($customer) {
                if ($customer->created_at) {
                    return $customer->created_at->format('d/m/Y H:i:s');
                }
            })
            ->editColumn('updated_at', function ($customer) {
                if ($customer->updated_at) {
                    return $customer->updated_at->format('d/m/Y H:i:s');
                }
            })
            ->rawColumns(['details']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
       
            return $this->builder()
            ->setTableId('orders-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('lfrtip')
            ->orderBy(1)
            // ->buttons(
            //     Button::make('create')->editor('editor'),
            //     Button::make('edit')->editor('editor'),
            //     // Button::make('remove')->editor('editor'),
            //     Button::make('colvis')->text('Cột'),
            // )
            ->select(false)
            ->language(config('app.datatableLanguage'));;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->className('text-center')->title('Mã đơn hàng'),
            // Column::make('user')->title('Khách hàng')->className('text-center'),
            Column::make('status')->title('Trạng thái')->className('text-center'),
            Column::make('promo_name')->title('Mã khuyến mãi')->className('text-center'),
            Column::make('c_total')->title('Tổng giá sản phẩm')->className('text-center'),       
            Column::make('delivery_time')->title('Thời gian giao hàng')->className('text-center'),
            Column::make('c_shippingfee')->title('Phí vận chuyển')->className('text-center'),
            Column::make('p_total')->title('Thành tiền')->className('text-center'),       
            Column::make('created_at')->title('Ngày tạo')->className('text-center'),
            // Column::make('updated_at')->title('Ngày sửa')->className('text-center'),
            Column::computed('details')->title('Chi tiết')->className('text-center'),
            Column::make('total')->title('Tổng tiền')->className('text-center')->searchable(true)->visible(false)->title(''),
            Column::make('shippingfee')->title('Phí vận chuyển')->className('text-center')->searchable(true)->visible(false)->title(''),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'CustumerOrder_' . date('YmdHis');
    }
}
