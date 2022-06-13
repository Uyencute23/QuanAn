<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\DataTables\UsersDataTableEditor;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index(UsersDataTable $dataTable)
    {
        // dd(User::all());
        return $dataTable->render('admin.pages.users');
    }
    public function store(UsersDataTableEditor $editor)
    {
        return $editor->process(request());
    }
}
