<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index(){
       // $data = ['types'=>ProductType::all(),'prods'=>Product::all(),'active'=> 1];
        // dd($data);

        // top 10 product most buy
        $top10 = OrderDetail::selectRaw('product_id, sum(quantity) as quantity,sum(total) as total')
            ->groupBy('product_id')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();
        // dd($top10);

        $data = [
            'title' => 'Dashboard',
            'active' => [0,0],
            'top10' => $top10,
        ];
        return view('admin.pages.dashboard',$data);
    }
}
