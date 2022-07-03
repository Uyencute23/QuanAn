<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class Summary extends Component
{

    public $totalRevenueDay = 0;
    public $totalRevenueWeek = 0;
    public $totalRevenueMonth = 0;
    public $totalRevenueYear = 0;

    public function render()
    {
        //calculate total  revenue in month

        $this->totalRevenueMonth = Order::whereMonth('created_at', date('m'))->sum('total');
        $this->totalRevenueMonth = number_format($this->totalRevenueMonth, 0, ',', '.');
        // dd($this->totalRevenueMonth);
        //calculate total  revenue in year

        $this->totalRevenueYear = Order::whereYear('created_at', date('Y'))->sum('total');
        $this->totalRevenueYear = number_format($this->totalRevenueYear, 0, ',', '.');
        // dd($this->totalRevenueYear);
        //calculate total  revenue in day

        $this->totalRevenueDay = Order::whereDay('created_at', date('d'))->sum('total');
        $this->totalRevenueDay = number_format($this->totalRevenueDay, 0, ',', '.');
        // dd($this->totalRevenueDay);
        //calculate total  revenue in week
        $this->totalRevenueWeek = 0;
        $this->totalRevenueWeek = Order::whereBetween('created_at', [date('Y-m-d', strtotime('last monday')), date('Y-m-d', strtotime('next sunday'))])->sum('total');
        $this->totalRevenueWeek = number_format($this->totalRevenueWeek, 0, ',', '.');
        // dd($this->totalRevenueWeek);
        return view('livewire.summary');
    }
}
