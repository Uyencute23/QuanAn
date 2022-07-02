<?php

namespace App\Http\Controllers;

use App\DataTables\OrdersDataTable;
use App\DataTables\OrdersDataTableEditor;
use App\Events\OrderEvent;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Promotion;

class OrderController extends Controller
{
    public function index(OrdersDataTable $dataTable)
    {
        // $type = ProductType::all();
        $data = [
            'title' => 'Quản lý hoá đơn',
            'active' => [1, 2],
            'customers' => Customer::all(),
            'promotions' => Promotion::all(),
            // 'type' => $type,
        ];
        return $dataTable->render('admin.pages.orders', $data);
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


    public function show($id)
    {
        //show by id
        $order = Order::find($id);
        $promotion_price = 0;
        error_log($order->promo_id);
        //get promotion by id
        if ($order->promo_id != null) {
            $promotion = Promotion::find($order->promo_id);
            //if total is less than max_price, apply promotion
            $total = $order->total / (1 - $promotion->precent / 100);
            $promotion_price = $total * $promotion->precent / 100;
            // dd($this->promotion_price);
            if ($promotion_price > $promotion->max_price) {
                //if total is more than max_price, apply max_price
                $promotion_price = $promotion->max_price;
            }
        } else {
            $promotion = null;
        }
        error_log($promotion_price);

        $data = [
            'active' => [0, 0],
            'title' => 'Chi tiết hoá đơn',
            'order' => $order,
            'customer' => Customer::find($order->customer_id),
            'promotion' => $promotion,
            'promotion_price' => $promotion_price,
            'order' => $order,
            'order_details' => OrderDetail::where('order_id', $id)->get(),
        ];
        return view('admin.pages.order-details', $data);
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
    public function sendMessage($message)
    {
        event(new OrderEvent([
            'admin' => [
                'img'=> 'https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png',
                'title' => 'Đơn hàng mới',
                'content' => 'Có đơn hàng mới từ Long luu',
                'link' => 'http://127.0.0.1:8000/order/1',
                'created_at' => now()->diffForHumans(),
            ]
        ]));
        return response()->json(['success' => $message]);
    }
}
