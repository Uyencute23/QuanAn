<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index(){
       // $data = ['types'=>ProductType::all(),'prods'=>Product::all(),'active'=> 1];
        // dd($data);
        return view('pages.admin.dashboard');
    }
}
