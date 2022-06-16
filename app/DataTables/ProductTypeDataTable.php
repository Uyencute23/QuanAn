<?php

namespace App\DataTables;

use App\Models\ProductType;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductTypeDataTable extends DataTable
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
            ->addColumn('image', function ($product) {
                return '<img src="' . $product->img . '" width="100px" height="100px">';
            })
            ->editColumn('created_at', function ($product) {
                if ($product->created_at) {
                    return $product->created_at->format('d/m/Y H:i:s');
                }
            })
            ->editColumn('updated_at', function ($product) {
                if ($product->updated_at) {
                    return $product->updated_at->format('d/m/Y H:i:s');
                }
            })
            ->addColumn('subdescription', function ($product) {
                return mb_strimwidth($product->description, 0, 120, "...");
            })
            ->rawColumns(['image']);
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProductType $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProductType $model)
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
                    ->setTableId('producttype-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('lBfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->editor('editor'),
                        Button::make('edit')->editor('editor'),
                        Button::make('remove')->editor('editor'),
                        // Button::make('print')->text('In'),
                        Button::make('colvis')->text('Cột'),
                        // [
                        //     'extend' => 'csv',
                        //     'split' => ['pdf', 'excel'],
                        //     // 'className' => 'bg-warning',
                        // ]
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
            Column::make('image')->title('Ảnh'),
            Column::make('name')->title('Tên danh mục'),
            Column::make('subdescription')->title('Mô tả')->className('text-wrap min-w-1')->searchable(true)->defaultContent('Chưa có'),
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
    //     return 'ProductType_' . date('YmdHis');
    // }
}
