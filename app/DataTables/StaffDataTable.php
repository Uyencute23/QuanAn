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
            ->eloquent($query->with('user'))
            ->setRowId('id')
            // ->addColumn('name', function ($staff) {
            //     return $staff->user->name;
            // })
            // ->addColumn('email', function ($staff) {
            //     return $staff->user->email;
            // })
            ->addColumn('image', function ($staff) {
                if ($staff->img) {
                    return '<img  src="' . $staff->img . '" width="100px" height="100px" style="object-fit: contain;">';
                } else {
                    return '<img src="https://via.placeholder.com/100x100" width="100px" height="100px">';
                }
            })
            ->editColumn('created_at', function ($staff) {
                if ($staff->created_at) {
                    return $staff->created_at->format('d/m/Y H:i:s');
                }
            })
            ->editColumn('updated_at', function ($staff) {
                if ($staff->updated_at) {
                    return $staff->updated_at->format('d/m/Y H:i:s');
                }
            })
            ->rawColumns(['image']);
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
                Button::make('edit')->editor('editor')->className('bg-primary'),
                Button::make('remove')->editor('editor')->className('bg-primary'),
                Button::make('print')->text('In')->className('bg-primary'),
                Button::make('colvis')->text('Cột')->className('bg-primary'),
                [
                    'extend' => 'csv',
                    'split' => ['pdf', 'excel'],
                    'className' => 'bg-primary',
                ]
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
            Column::make('user.name')->title('Họ và tên'),
            Column::make('user.email')->title('Email'),
            Column::make('image')->title('Ảnh'),
            Column::make('phone')->title('Số điện thoại')->className('text-center')->defaultContent('Chưa có'),
            Column::make('created_at')->title('Ngày tạo')->className('text-center')->defaultContent('Chưa có'),
            Column::make('updated_at')->title('Ngày sửa')->className('text-center')->defaultContent('Chưa có'),
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
