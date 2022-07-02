<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notifycation extends Component
{
    protected $listeners = [
        'refreshNotify' => '$refresh',
        'addNotifycation' => 'addNotifycation'
    ];
    public $listNotifycation = [
        // [
        //     'title' => 'Thông báo',
        //     'content' => 'Bạn có 1 đơn hàng mới',
        //     'link' => 'admin/orders',
        //     'created_at' => '2020-01-01',
        // ]
    ];
    public function render()
    {
        return view('livewire.notifycation');
    }
    //add notifycation
    public function addNotifycation($notifycation)
    {
        $this->listNotifycation[] = $notifycation;
        // dd($this->listNotifycation);
        $this->emit('refreshNotify');
    }
}
