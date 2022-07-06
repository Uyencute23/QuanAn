<?php

namespace App\DataTables;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;

class PromotionsDataTableEditor extends DataTablesEditor
{
    protected $model = Promotion::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            // 'email' => 'required|email|unique:' . $this->resolveModel()->getTable(),
            'name'  => 'required',
            'precent' => 'required|numeric|min:1|max:100',
            'max_price' => 'required|numeric|min:1',
        ];
    }

    public function creating(Model $model)
    {
       $model->link ='';
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
            'name'  => 'required',
            'precent' => 'required|numeric|min:1|max:100',
            'max_price' => 'required|numeric|min:1',
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
}
