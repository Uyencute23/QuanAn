<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    function index(){
        return view('pages.fullmenu',['types'=>ProductType::all(),'prods'=>Product::all(),'active'=> 3]);
    }
}
