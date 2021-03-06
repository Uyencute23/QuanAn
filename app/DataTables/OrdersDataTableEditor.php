<?php

namespace App\DataTables;

use App\Events\OrderEvent;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;

class OrdersDataTableEditor extends DataTablesEditor
{
    protected $model = Order::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            // 'email' => 'required|email|unique:' . $this->resolveModel()->getTable(),
            // 'name'  => 'required',
        ];
    }

    /**
     * Get edit action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function editRules(Model $model)
    {
        return [
            // 'email' => 'sometimes|required|email|' . Rule::unique($model->getTable())->ignore($model->getKey()),
            // 'name'  => 'sometimes|required',
        ];
    }

    /**
     * Get remove action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function removeRules(Model $model)
    {
        return [];
    }

    //updating
    public function updating(Model $model, array $data)
    {

        event(new OrderEvent([
            'client' => [         
                'status' => $data['status'],
                'id' => $model->id,
                'customer_id' => $model->customer_id,
            ]
        ]));
        return $data;
    }
}
