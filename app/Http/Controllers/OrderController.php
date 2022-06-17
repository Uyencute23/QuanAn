<?php

namespace App\Http\Controllers;

use App\DataTables\OrdersDataTable;
use App\DataTables\OrdersDataTableEditor;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    public function index(OrdersDataTable $dataTable)
    {
        // $type = ProductType::all();
        $data =[
            'title' => 'Quản lý hoá đơn',
            'active' => [1,2],
            // 'type' => $type,
        ];
        return $dataTable->render('admin.pages.orders',$data);
    }

    public function store(OrdersDataTableEditor $editor)
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
    //  * @param  \App\Http\Requests\StoreOrderRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StoreOrderRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
