<?php

namespace App\Http\Livewire;

use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartDetails extends Component
{
    protected $listeners = ['refreshCart' => '$refresh'];
    public function render()
    {
        $data=[
            'active'=>0,
            'detais' => Auth::user()->customer->cart->cartDetails,
            'cart' => Auth::user()->customer->cart,
            'promo' => Promotion::all()
        ];
        return view('livewire.cart-details',$data);
    }
}
