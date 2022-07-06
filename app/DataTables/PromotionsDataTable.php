<?php

namespace App\DataTables;

use App\Models\Promotion;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PromotionsDataTable extends DataTable
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
            ->addColumn('subdescription', function ($product) {
                return mb_strimwidth($product->description, 0, 120, "...");
            })
            ->editColumn('c_max_price', function ($product) {
                return number_format($product->max_price, 0, ',', '.').' đ';
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
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Promotion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Promotion $model)
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
            ->setTableId('promotions-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('lBfrtip')
            // ->orderBy(1)
            ->buttons(
                Button::make('create')->editor('editor')->className('bg-warning'),
                Button::make('edit')->editor('editor')->className('bg-warning'),
                Button::make('remove')->editor('editor')->className('bg-warning'),
                // Button::make('print')->text('In')->className('bg-warning'),
                Button::make('colvis')->text('Cột')->className('bg-warning'),
                // [
                //     'extend' => 'csv',
                //     'split' => ['pdf', 'excel'],
                //     'className' => 'bg-warning',
                // ]
            )
            ->select('os')
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
            Column::make('id')->addClass('text-center'),
            Column::make('name')->addClass('text-center')->title('Mã'),
            Column::make('precent')->addClass('text-center')->title('Phần trăm'),
            Column::make('c_max_price')->addClass('text-center')->title('Giảm giá tối đa')->searchable(false),
            Column::make('subdescription')->title('Mô tả')->className('text-wrap min-w-1'),
            Column::make('start_time')->addClass('text-center')->title('Thời gian đầu'),
            Column::make('end_time')->addClass('text-center')->title('Thời gian kết thúc'),
            Column::make('created_at')->addClass('text-center')->title('Ngày tạo'),
            Column::make('updated_at')->addClass('text-center')->title('Ngày sửa'),
            Column::make('max_price')->searchable(true)->visible(false)->title(''),
            Column::make('description')->searchable(true)->visible(false)->title(''),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Promotions_' . date('YmdHis');
    }
}
