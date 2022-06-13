<?php

namespace App\DataTables;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;

class StaffDataTableEditor extends DataTablesEditor
{
    protected $model = Staff::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            // 'email' => 'required|email|unique:' . $this->resolveModel()->getTable(),
            'phone'  => 'nullable|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/|max:11|min:10',
        ];
    }
    // public function creating(Model $model, array $data)
    // {
    //     // $model->user_id = $data['user_id'];
    //     $model->phone = $data['phone'];
    //     $model->img = $data['img'];
    //     // $model->password = Hash::make($data['password']);
    // }
    
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
            'user_id'  => 'sometimes|required',
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
