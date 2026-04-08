<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
class Index extends Component
{
    public $todaySales = 0;
    public $weekSales = 0;
    public $monthSales = 0;

    public function mount (){
         $this->todaySales = Order::whereDate('created_at', today())
            ->where('status', 'Approved')
            ->sum('total_price');

        $this->weekSales = Order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->where('status', 'Approved')
            ->sum('total_price');

        $this->monthSales = Order::whereMonth('created_at', now()->month)
            ->where('status', 'Approved')
            ->sum('total_price');
      }
    public function render()
    {
        return view('livewire.admin.index');
    }
}
