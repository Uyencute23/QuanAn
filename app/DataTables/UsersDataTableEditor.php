<?php

namespace App\DataTables;

use App\Models\User ;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;

class UsersDataTableEditor extends DataTablesEditor
{
    protected $model = User::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'email' => 'required|email|unique:' . $this->resolveModel()->getTable(),
            'name'  => 'required',
        ];
    }
    public function creating(Model $model, array $data)
    {
        $data['password'] = bcrypt($data['password']);

        return $data;
    }
    // public function creating(Model $model, array $data)
    // {
    //     $model->role_id = 2;
    //     $model->name = $data['name'];
    //     $model->email = $data['email'];
    //     $model->password = Hash::make($data['password']);
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
            'email' => 'sometimes|required|email|' . Rule::unique($model->getTable())->ignore($model->getKey()),
            'name'  => 'sometimes|required',
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
