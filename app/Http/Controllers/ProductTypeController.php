<?php

namespace App\Http\Controllers;

use App\DataTables\ProductTypeDataTable;
use App\DataTables\ProductTypeDataTableEditor;
use App\Models\ProductType;
use App\Http\Requests\StoreProductTypeRequest;
use App\Http\Requests\UpdateProductTypeRequest;

class ProductTypeController extends Controller
{
    public function index(ProductTypeDataTable $dataTable)
    {
        $type = ProductType::all();
        $data =[
            'title' => 'Quản lý danh mục',
            'type' => $type,
            'active' => [2,5],
        ];
        return $dataTable->render('admin.pages.product-type',$data);
    }

    public function store(ProductTypeDataTableEditor $editor)
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
    //  * @param  \App\Http\Requests\StoreProductTypeRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StoreProductTypeRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductTypeRequest  $request
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductTypeRequest $request, ProductType $productType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        //
    }
}
