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
            'description' => 'required|string|max:255',
        ];
    }

    public function creating(Model $model, array $data)
    {
        $model->link = '';
        $model->description = '';
        if (isset($data['link'])) {
            $model->link = $data['link'];
        }
        if (isset($data['description'])) {
            $model->description = $data['description'];
        }
        return $data;
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
            'description' => 'required|string|max:255',
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
