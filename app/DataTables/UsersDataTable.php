<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
            ->eloquent($query->with('role'))
            ->setRowId('id')
            ->editColumn('created_at', function ($user) {
                if ($user->created_at) {
                    return $user->created_at->format('d/m/Y H:i:s');
                }
            })
            ->editColumn('updated_at', function ($user) {
                if ($user->updated_at) {
                    return $user->updated_at->format('d/m/Y H:i:s');
                }
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('lBfrtip')
            // ->orderBy(1)
            ->buttons(
                Button::make('create')->editor('editor'),
                Button::make('edit')->editor('editor'),
                Button::make('remove')->editor('editor'),
                Button::make('colvis')->text('Cột'),
                // [
                //     'extend' => 'csv',
                //     'split' => ['pdf', 'excel'],
                //     // 'className' => 'bg-primary',
                // ]
            )
            ->select('id', 'name', 'status', 'date_time', 'created_at', 'updated_at')
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
            Column::make('name')->title('Họ và Tên'),
            Column::make('email')->title('Email'),
            Column::make('role.name')->title('Quyền')->className('text-center'),
            Column::make('created_at')->title('Ngày tạo'),
            Column::make('updated_at')->title('Ngày cập nhật'),
        ];
    }

    // /**
    //  * Get filename for export.
    //  *
    //  * @return string
    //  */
    // protected function filename()
    // {
    //     return 'Users_' . date('YmdHis');
    // }
}
