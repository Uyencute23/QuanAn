<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Promotion;
use Livewire\Component;

class CreateOrder extends Component
{
    public $listItems = [];
    protected $listeners = [
        'refreshOrder' => '$refresh',
        'additem' => 'addItem',
        'removeitem' => 'removeItem',
        'minusitem' => 'minusItem',
        'createorder' => 'createOrder',
        'applyPromotion' => 'applyPromotion',
    ];
    public $total = 0;
    public $total_quantity = 0;
    public $promotions = [];
    public $promotion = 0;
    public $promotion_price = 0;
    public function render()
    {
        // $data = ['listItems' => $this->listItems];
        //promotion

        $this->promotions = Promotion::all();
        $this->sumTotal();
        $this->applyPromotion();
        return view('livewire.create-order');
    }

    //push more item to array list
    public function addItem($item)
    {
        //get product by id
        $product = Product::find($item);
        //if item exist in list, increase quantity
        if (array_key_exists($item, $this->listItems)) {
            $this->listItems[$item]['quantity']++;
        } else {
            //if item not exist in list, add new item
            $this->listItems[$item] = [
                'id' => $item,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }
        error_log(print_r($this->listItems, true));
    }
    //remove item from array list
    public function removeItem($item)
    {
        unset($this->listItems[$item]);
    }
    //minuse item from array list
    public function minusItem($item)
    {
        if (array_key_exists($item, $this->listItems)) {
            if ($this->listItems[$item]['quantity'] > 1) {
                $this->listItems[$item]['quantity']--;
            } else {
                unset($this->listItems[$item]);
            }
        }
    }
    //sum total price of all item in array list
    public function sumTotal()
    {
        $this->total = 0;
        $this->total_quantity = 0;
        foreach ($this->listItems as $item) {
            $this->total += $item['price'] * $item['quantity'];
            $this->total_quantity += $item['quantity'];
        }
    }

    //createorder
    public function createOrder()
    {
        $order = new Order();
        $order->total = $this->total;
        $order->customer_id = 1;
        $order->status = 'Hoàn tất đơn hàng';
        if($this->promotion != 0){
            $order->promo_id = $this->promotion;
        }
        $order->save();
        foreach ($this->listItems as $item) {
            $order_item = new OrderDetail();
            $order_item->order_id = $order->id;
            $order_item->product_id = $item['id'];
            $order_item->quantity = $item['quantity'];
            $order_item->total = $item['price'];
            $order_item->save();
        }
        $this->listItems = [];
        $this->total = 0;
        $this->total_quantity = 0;
        $this->emit('refreshOrder');
    }
    //promotion
    public function applyPromotion()
    {
        //get promotion by id and calculate total
        if ($this->promotion != 0) {
            $promotion = Promotion::find($this->promotion);
            //if total is less than max_price, apply promotion
            $this->promotion_price = $this->total * $promotion->precent / 100;
            // dd($this->promotion_price);
            if ($this->promotion_price < $promotion->max_price) {
                $this->total = $this->total - $this->promotion_price;
            } else {
                //if total is more than max_price, apply max_price
                $this->promotion_price = $promotion->max_price;
                $this->total = $this->total -  $this->promotion_price ;
            }
            // dd($this->total);
        }
    }
}
