<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Http\Requests\StoreCartDetailRequest;
use App\Http\Requests\UpdateCartDetailRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartDetailController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        // if ($request->ajax()) {
        $request->validate([
            'product_id' => ['required'],
            'quantity' => ['required'],
        ]);
        $sp = Product::find($request->product_id);
        if ($sp) {
            $current = CartDetail::where('cart_id', "=", Auth::user()->customer->cart->id)->where('product_id', '=', $sp->id)->first();
            // dd($current);
            // return response(['success' => $current,'sp'=>Auth::user()->customer->cart->id], 200);
            if ($current == null) {
                $cartdetail = new CartDetail();
                $cartdetail->cart_id = Auth::user()->customer->cart->id;
                $cartdetail->product_id = $request->product_id;
                $cartdetail->quantity = $request->quantity;
                $cartdetail->total = $sp->price * $request->quantity;
                if ($cartdetail->save())
                    return response()->json(['success' => $cartdetail], 200);
            } else {
                // $current->total =  $current->total + $sp->price * $request->quantity;
                $current->quantity = $current->quantity + $request->quantity;
                if ($current->save())
                    return response()->json(['success' => $current], 200);
            }

            return response()->json(['fail' => 'không thành công,sản phẩm đã có trong giỏ']);
        }
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CartDetail $cartDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CartDetail $cartDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartDetailRequest  $request
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartDetailRequest $request, CartDetail $cartDetail)
    {
        //
    }

  
    public function destroy($id)
    {
        //
        $dt = CartDetail::find($id);
        $dt->delete();
        return response(['success'=>'delete success','prod_del'=> $dt]);

    }
}
