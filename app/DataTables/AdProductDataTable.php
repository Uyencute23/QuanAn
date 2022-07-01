<?php

namespace App\DataTables;

use App\Models\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdProductDataTable extends DataTable
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
            ->eloquent($query->with('productype'))
            ->setRowId('id')
            ->addColumn('image', function ($product) {
                return '<img src="' . $product->img . '" width="100px" height="100px">';
            })
            ->addColumn('subname', function ($product) {
                return '<h6>' . mb_strimwidth($product->name, 0, 120, "...") . '</h6>';
            })
            ->addColumn('pricef', function ($product) {
                return  number_format($product->price, 0, ',', '.') . 'đ';
            })
            ->addColumn('subdescription', function ($product) {
                return mb_strimwidth($product->description, 0, 120, "...");
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
            ->addColumn('product_type', function ($product) {
                return $product->productype->name;
            })
            ->addColumn('action', function ($product) {
                // return '<button wire:click="additem('. $product->id.')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Thêm</button>';
                return '<div class="col">
                            <button onClick="addItem('. $product->id.')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Thêm</button>
                          
                           
                        </div>';
            })
            ->rawColumns(['image', 'subname', 'subdescription', 'pricef', 'action']);
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
            // ->dom('lfrtip')
            ->buttons(
                // Button::make('create')->editor('editor')->className('bg-warning'),
                // Button::make('edit')->editor('editor')->className('bg-warning'),
                // Button::make('remove')->editor('editor')->className('bg-warning'),
                // Button::make('print')->text('In')->className('bg-warning'),
                Button::make('colvis')->text('Cột')->className('bg-warning'),
                // [
                //     'extend' => 'csv',
                //     'split' => ['pdf', 'excel'],
                //     'className' => 'bg-warning',
                // ]
            )
            // ->select('id', 'name', 'img', 'created_at', 'updated_at')
            ->language(config('app.datatableLanguage'))
            ->parameters([
                'width' => '100%',
                 'autoWidth' => true,
                 "scrollY"=>"400px",
                 "scrollCollapse"=> true,]);
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
            Column::make('subname')->title('Tên')->className('text-wrap max-w-1'),
            Column::make('pricef')->title('Đơn giá')->className('text-center'),
            Column::make('product_type')->title('Loại sản phẩm')->className('text-center'),
            // Column::make('subdescription')->title('Mô tả')->className('text-wrap max-w-1'),
                // Column::make('created_at')->title('Ngày tạo')->className('text-center'),
                // Column::make('updated_at')->title('Ngày cập nhật')->className('text-center'),
            Column::make('name')->searchable(true)->visible(false)->title(''),
            Column::make('description')->searchable(true)->visible(false)->title(''),
            Column::make('price')->searchable(true)->visible(false)->title(''),
            Column::make('productype.name')->searchable(true)->visible(false)->title(''),
            Column::make('action')->title('Thao tác')->className('text-center'),
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
