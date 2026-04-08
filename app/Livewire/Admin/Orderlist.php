<?php

namespace App\Livewire\Admin;
use App\Models\Order;
use Livewire\Component;

class Orderlist extends Component
{
    public function approve($id){
        $order = Order::find($id);
        if($order){
            $order->update(['status' => 'Approved']);
        }
    }

    public function decline($id){
        $order = Order::find($id);
        if($order){
            $order->update(['status' => 'Declined']);
        }
    }

    public function render()
    {
        return view('livewire.admin.orderlist', [
        'orders' =>Order::with('product' , 'user') ->latest()->get()
    ]);
    }
}
