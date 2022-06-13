<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\DataTables\UsersDataTableEditor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index(UsersDataTable $dataTable)
    {
        // dd(User::all());
        $data =[
            'title' => 'Quản lý tài khoản',
            'role' => Role::all(),
            'active' => [2,6],
        ];
        return $dataTable->render('admin.pages.users',$data);
    }
    public function store(UsersDataTableEditor $editor)
    {
        return $editor->process(request());
    }
}
