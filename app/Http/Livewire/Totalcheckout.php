<?php

namespace App\Http\Livewire;

use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Totalcheckout extends Component
{
    protected $listeners = ['refreshTotal' => '$refresh', 'total' => 'total'];
    public $price = 0;
    public $total;
    public $error='';
    public function render()
    {
        $cart = Auth::user()->customer->cart;

        $this->total = number_format($cart->total - $this->price, 0, ',', '.');
        // $this->total = $this->price;
        $data = [
            'cart' => $cart,
        ];

        return view('livewire.totalcheckout', $data);
    }
    public function total($promo)
    {
        //find total by name
        $total = Promotion::where('name', $promo)->first();
        // // dd($total);
        if ($total) {
            $cart = Auth::user()->customer->cart;
            // //get precent of total
            $percent = $total->precent;
            // //calculate price by precent
            $price = $cart->total * $percent / 100;
            if ($price < $total->max_price) {
                $this->price =  $price;
            } else {
                $this->price = $total->max_price;
            }
            $this->error = '';
        }
        else {
            $this->error = 'Mã giảm giá không tồn tại';
        }
    }
}
