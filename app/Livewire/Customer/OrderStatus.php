<?php

namespace App\Livewire\Customer;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class OrderStatus extends Component
{
    public function render()
    {
        $orders = Order::with('product')
        ->where('user_id', Auth::id())
        ->get();
        return view('livewire.customer.order-status', compact('orders'));
    }
}
