<?php

namespace App\DataTables;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Yajra\DataTables\Html\Editor\Fields\Field;

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
            'user.email' => 'required|email|unique:' . $this->resolveModel()->getTable(),
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
            'user.email' => 'required|email',
            'phone'  => 'nullable|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/|max:11|min:10',
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


    // public function creating(Model $model, array $data)
    // {
    //     $data['password'] = bcrypt($data['password']);

    //     return $data;
    // }

    /**
     * Pre-update action event hook.
     *
     * @param Model $model
     * @return array
     */
    public function updating(Model $model, array $data)
    {

        //get user from model
        $user = $model->user;
        //set name and email for user
        $user->name = $data['user']['name'];
        $user->email = $data['user']['email'];
        //save user
        $user->save();
        return $data;
    }
}
