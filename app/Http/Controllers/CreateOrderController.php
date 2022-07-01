<?php

namespace App\Http\Controllers;

use App\DataTables\AdProductDataTable;
use App\DataTables\AdProductDataTableEditor;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class CreateOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdProductDataTable $dataTable)
    {
        //
        
        $type = ProductType::all();
        $data =[
            'title' => 'Tạo hoá đơn',
            'active' => [1,1],
            'products' => Product::all(),
            'type' => $type,
        ];
        return  $dataTable->render('admin.pages.createorder',$data);
    }

    public function store(AdProductDataTableEditor $editor)
    {
        return $editor->process(request());
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
