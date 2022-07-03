<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tracking extends Component
{
    public $status=0;
    public $orderid;
    protected $listeners = ['refreshTracking' => '$refresh'];
    public function render()
    {
        
        $order = Order::where('customer_id', Auth::user()->customer->id)->where('id', $this->orderid)->first();
        if ($order) {
            switch (true) {
                case str_contains($order->status, 'Đang chờ xác nhận'):
                    $this->status = 0;
                    break;
                case str_contains($order->status, 'Đã xác nhận'):
                    $this->status = 1;
                    break;
                case str_contains($order->status, 'Đang chuẩn bị đơn hàng'):
                    $this->status = 2;
                    break;
                case str_contains($order->status, 'Đang giao hàng'):
                    $this->status = 3;
                    break;
                case str_contains($order->status, 'Đã giao hàng'):
                    $this->status = 4;
                    break;
                case str_contains($order->status, 'Đã nhận được hàng'):
                    $this->status = 5;
                    break;
                case str_contains($order->status, 'Đã hủy'):
                    $this->status = 6;
                    break;
                default:
                    $this->status = 0;
                    break;
            }
            return view('livewire.tracking');
        } else {
            return redirect()->back()->with('error', 'Order not found');
        }
        
    }
}
