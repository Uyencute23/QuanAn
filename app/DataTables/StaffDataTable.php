<?php

namespace App\DataTables;

use App\Models\Staff;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StaffDataTable extends DataTable
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
            ->addColumn('name', function ($staff) {
               return $staff->user->name;
            })
            ->addColumn('email', function ($staff) {
                return $staff->user->email;
             })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Staff $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Staff $model)
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
                    ->setTableId('staff-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('lBfrtip')
                    // ->orderBy(1)
                    ->buttons(
                        // Button::make('create')->editor('editor'),
                        Button::make('edit')->editor('editor'),
                        Button::make('remove')->editor('editor'),
                        Button::make('print')->text('In'),
                    )
                    ->select('id', 'name', 'img', 'phone', 'created_at', 'updated_at')
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
            Column::make('id')->className('text-center'),
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
    //     return 'Staff_' . date('YmdHis');
    // }
}
