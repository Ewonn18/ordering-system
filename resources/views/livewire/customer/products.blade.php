<div>
    @if (session()->has('message'))
    <div class="mb-3 p-3 bg-green-500 text-white rounded">
        {{session('message')}}
    </div>
    @endif

            @if (session()->has('message'))
    <div class="mb-3 p-3 bg-green-500 text-white rounded">
        {{session('error')}}
    </div>
    @endif

            


    <div class="grid grid-cols-4 gap-4">
      @foreach ($products as $pd )
          <div class="border rounded-lg p-4 shadow">
             <h2 class="text-xl font-semibold text-center">{{$pd->name}}</h2>
             <p class="text-gray-600">Description:{{$pd->description}}</p>
            <p class="text-lg font-bold mt-2 text-green-900">Price:{{$pd->price}}</p>
            <p class="text-gray-600 text-right">Stock:{{$pd->stock}}</p>
             <button wire:click="confirmOrder({{$pd->id}})" class="mt-3 bg-gray-700 text-white px-4 py-2 rounded w-full hover:bg-gray-900">
            Order Now
          </button>
          </div>

      @endforeach
    </div>

    @if($showOrderModal)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
       <div class="bg-white p-6 rounded shadow-lg w-96">
          <h2 class="text-xl font-semibold mb-3">Confirm Order</h2>
          <p>Product {{$selectedProduct->name}}</p>
        <p>Price {{$selectedProduct->price}}</p>
       <p>Available Stock{{$selectedProduct->stock}}</p>
       <div class="mt-3">
         <label for="">Quantity</label>
         <input type="number" min="1" id="" wire:model="quantity" class="w-full border px-2 py-1 rounded mt-1">
       </div>

       <div class="flex justify-end mt-4 gap-2">
        <button wire:click="set('showOrderModal', false)" class="px-4 py-2 bg-gray-600 text-white rounded">Cancel</button>
         <button wire:click="placeorder" class="px-4 py-2 bg-green-600 text-white rounded">Confirm Order</button>
       </div>
       </div>
    </div>
    @endif
</div>