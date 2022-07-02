<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    protected $listeners = ['refreshNavbar' => '$refresh'];
    public $Totalcart =0;
    public function render()
    {
        if (Auth::check() && Auth::user()->role_id == 2) {
            $this->Totalcart = Auth::user()->customer->cart->quantity;
        }
        return view('livewire.navbar');
    }
}
