<?php

namespace App\Livewire\Customer;
use App\Models\Product3;
use App\Models\Order;
use Livewire\Component;

class Products extends Component
{
    public $selectedProduct;
    public $quantity =1;
    public $showOrderModal = false;
    public function render()
    {
        return view('livewire.customer.products', [
            'products' =>Product3::All()
        ]);
    }

    public function confirmOrder($productId){
           $this->selectedProduct= Product3::find($productId);
          $this->quantity= 1;
          $this->showOrderModal= true;

    }

    public function placeorder(){
        if ($this->quantity < 1){
            $this->quantity= 1;
        }
        if ($this->quantity > $this->selectedProduct->stock){
            session()->flash('error', 'Not Enough Stock');
            return;
        }

        Order::create([
            'user_id' => auth()->id(),
            'product_id'=>$this->selectedProduct->id,
            'quantity' =>$this->quantity,
            'total_price' =>$this->selectedProduct->price * $this->quantity,
            'status' => 'pending'
        ]);

        $this->selectedProduct->decrement('stock', $this->quantity);
        session()->flash('message', 'Order Placed Successfully!');

        $this->showOrderModal= false;
    }
}