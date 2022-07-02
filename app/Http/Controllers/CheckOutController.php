<?php

namespace App\Http\Controllers;

use App\Events\OrderEvent;
use App\Models\CartDetail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Promotion;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data customer_id, address, phone, promo_id
        $request->validate([
            'customer_id' => 'required | numeric',
            'address' => 'required | max:255',
            'phone' => 'required|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/|max:11|min:10',
            'promo_id' => 'nullable',
        ]);

        //get customer id
        $customer_id = $request->customer_id;
        //get customer
        $customer = Customer::find($customer_id);
        //if customer->phone is null
        // if ($customer->phone == null) {
        //set customer->phone to $request->phone
        $customer->phone = $request->phone;
        // }
        //if customer->address is null
        // if ($customer->address == null) {
        //set customer->address to $request->address
        $customer->address = $request->address;
        // }
        $customer->save();
        //create order
        $order = new Order();
        //set order->customer_id to $customer_id
        $order->customer_id = $customer_id;
        //set order->status 
        $order->status = 'Đang chờ xác nhận';
        //get promo_id like $request->promo_id
        $promo_id = Promotion::where('name', $request->promo_id)->first();
        //calculate total with promotion
        $cart = $customer->cart;
        if ($promo_id) {
            $total = $cart->total * $promo_id->precent / 100;
            if ($total < $promo_id->max_price) {
                $order->total = $cart->total - $total;
            } else {
                $order->total = $cart->total -  $promo_id->max_price;
            }
        } else {
            $order->total = $cart->total;
        }
        //if promo_id is not null
        if ($promo_id != null) {
            //set order->promo_id to promo_id->id
            $order->promo_id = $promo_id->id;
        }
        //set delivery_time to $request->delivery_time
        $order->delivery_time = 20;
        //set shippingfee to $request->shippingfee
        $order->shippingfee = 15000;
        //save order
        $order->save();
        //get cart detail of customer by cart_id
        $cart_details = CartDetail::where('cart_id', $customer->cart->id)->get();

        //foreach cart details of customer as $product_id create order_detail
        foreach ($cart_details as $cart_detail) {
            //create order_detail
            $order_detail = new OrderDetail();
            //set order_detail->order_id to $order->id
            $order_detail->order_id = $order->id;
            //set order_detail->product_id to $cart_detail->product_id
            $order_detail->product_id = $cart_detail->product_id;
            //set order_detail->quantity to $cart_detail->quantity
            $order_detail->quantity = $cart_detail->quantity;
            //set order_detail->price to $cart_detail->price
            $order_detail->total = $cart_detail->total;
            //save order_detail
            $order_detail->save();
        }
        //delete cart detail of customer
        CartDetail::where('cart_id', $customer->cart->id)->delete();
        //return success
        $img = 'https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png';
        if($customer->img)
        {
            $img =$customer->img;
        }
        event(new OrderEvent([
            'admin' => [      
                'img' =>$img ,      
                'title' => 'Đơn hàng mới',
                'content' => 'Bạn có đơn hàng mới từ ' . $customer->user->name,
                'link' => route('order.show', $order->id),
                'created_at' => now()->diffForHumans(),

            ]
        ]));
        return response()->json(['success' => 'Đặt hàng thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
