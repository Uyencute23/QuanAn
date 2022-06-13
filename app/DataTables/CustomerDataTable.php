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
            ->eloquent($query)
            ->setRowId('id')
            ->addColumn('name', function ($customer) {
               return $customer->user->name;
            })
            ->addColumn('email', function ($customer) {
                return $customer->user->email;
             })
            ;
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
                        Button::make('edit')->editor('editor')->className('bg-warning'),
                        Button::make('remove')->editor('editor')->className('bg-warning'),
                        Button::make('print')->text('In')->className('bg-warning'),
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
            Column::make('name')->title('Họ và tên'),
            Column::make('email')->title('Email'),
            
            // Column::make('img')->title('Ảnh'),
            Column::make('phone')->title('Số điện thoại'),
            Column::make('created_at')->title('Ngày tạo'),
            Column::make('updated_at')->title('Ngày sửa'),
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
