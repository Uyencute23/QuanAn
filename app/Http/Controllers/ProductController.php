<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\DataTables\ProductDataTableEditor;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductType;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $dataTable)
    {
        $type = ProductType::all();
        $data =[
            'title' => 'Quản lý món ăn',
            'type' => $type,
            'active' => [2,4],
        ];
        return $dataTable->render('admin.pages.product',$data);
    }

    public function store(ProductDataTableEditor $editor)
    {
        return $editor->process(request());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \App\Http\Requests\StoreProductRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StoreProductRequest $request)
    // {
    //     //
    // }


    public function show($id)
    {
        //
        $data = [
            'active'=>1,
            'title' => 'Chi tiết món ăn',
            'product' => Product::find($id),
            'rating' => Product::find($id)->rating,
        ];
        return view('pages.product-detail', $data);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
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
