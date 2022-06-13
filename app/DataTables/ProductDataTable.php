<?php

namespace App\DataTables;

use App\Models\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
                return '<img src="'.$product->img.'" width="100px" height="100px">';
            })
            ->addColumn('subname', function ($product) {
                return '<h6>'. mb_strimwidth($product->name, 0, 120, "...").'</h6>';
             })
            ->addColumn('pricef', function ($product) {
                return  number_format($product->price, 0, ',', '.').'đ';
            })
            ->addColumn('subdescription', function ($product) {
               return mb_strimwidth($product->description, 0, 120, "...");
            })
            ->editColumn('created_at', function ($product) {
                return $product->created_at->format('d/m/Y');
            })
            ->editColumn('updated_at', function ($product) {
                return $product->updated_at->format('d/m/Y');
            })
            ->addColumn('product_type', function ($product) {
                return $product->producType->name;
            })
            ->rawColumns(['image', 'subname', 'subdescription','pricef']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
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
                    ->setTableId('product-table')
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
            // Column::make('id'),  
            Column::make('image')->title('Ảnh'),
            Column::make('subname')->title('Tên sản phẩm')->className('text-wrap min-w-1'),
            Column::make('pricef')->title('Đơn giá')->className('text-center'),
            Column::make('product_type')->title('Loại sản phẩm')->className('text-center'),
            Column::make('subdescription')->title('Mô tả')->className('text-wrap min-w-1'),   
            Column::make('created_at')->title('Ngày tạo')->className('text-center'),
            Column::make('updated_at')->title('Ngày cập nhật')->className('text-center'),
        ];
    }

    // /**
    //  * Get filename for export.
    //  *
    //  * @return string
    //  */
    // protected function filename()
    // {
    //     return 'Product_' . date('YmdHis');
    // }
}
