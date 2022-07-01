<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class RatingController extends Controller
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
        //validate request
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'content' => 'required|string|max:255',
            'customer_id' => 'required|numeric|exists:customers,id',
            'product_id' => 'required|numeric|exists:products,id',
        ]);

        $customer_id = $request->customer_id;
        $product_id = $request->product_id;
        //find customer_id and product_id in database
        $customer = Customer::find($customer_id);
        error_log('[Order details] ' . $customer->order_detail);
        //get product_id in order_detail
        $order_detail = $customer->order_detail;
        $details = $order_detail->where('product_id', $product_id)->first();
        error_log('[Product in details] ' . $details);
        //check customer_id and product_id in rating table
        $rating = Rating::where('customer_id', $customer_id)->where('product_id', $product_id)->first();
        error_log('[Rating] ' . $rating);
        //if customer_id and product_id in rating table, update rating
        if ($details) {
            if (!$rating) {
                $rating = new Rating();
                $rating->customer_id = $customer_id;
                $rating->product_id = $product_id;
                $rating->rating = $request->rating;
                $rating->img = $request->img;
                $rating->content = $request->content;
                $rating->save();
                return response()->json(['success' => 'Đánh giá thành công'], 200);
            } else {
                return response()->json(['message' => 'Bạn đã đánh giá sản phẩm này rồi'], 400);
            }
        } else {
            return response()->json(['message' => 'Bạn hãy mua sản phẩm này, sau đó mới có thể đánh giá'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRatingRequest  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
