<?php

namespace App\DataTables;

use App\Models\Customer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustomerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query->with('user'))
            ->setRowId('id')
            ->addColumn('name', function ($customer) {
                return $customer->user->name;
            })
            ->addColumn('email', function ($customer) {
                return $customer->user->email;
            })
            ->addColumn('image', function ($customer) {
                if ($customer->img) {
                    return '<img  src="' . $customer->img . '" width="100px" height="100px" style="object-fit: contain;">';
                } else {
                    return '<img src="https://via.placeholder.com/100x100" width="100px" height="100px">';
                }
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
            ->rawColumns(['image']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Customer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Customer $model)
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
            ->setTableId('customer-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('lBfrtip')
            ->buttons(
                // Button::make('create')->editor('editor'),
                Button::make('edit')->editor('editor')->className('bg-success'),
                Button::make('remove')->editor('editor')->className('bg-success'),
                Button::make('print')->text('In')->className('bg-success'),
                Button::make('colvis')->text('Cột')->className('bg-success'),
                [
                    'extend' => 'csv',
                    'split' => ['pdf', 'excel'],
                    'className' => 'bg-success',
                ]
            )
            ->select('id', 'name', 'img', 'created_at', 'updated_at')
            ->language(config('app.datatableLanguage'));
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('user.name')->title('Họ và tên'),
            Column::make('user.email')->title('Email'),
            Column::make('image')->title('Ảnh'),
            Column::make('phone')->title('Số điện thoại')->defaultContent('Chưa có'),
            Column::make('address')->title('Địa chỉ')->defaultContent('Chưa có'),
            Column::make('created_at')->title('Ngày tạo')->defaultContent('Chưa có'),
            Column::make('updated_at')->title('Ngày sửa')->defaultContent('Chưa có'),
        ];
    }

    // /**
    //  * Get filename for export.
    //  *
    //  * @return string
    //  */
    // protected function filename()
    // {
    //     return 'Customer_' . date('YmdHis');
    // }
}
