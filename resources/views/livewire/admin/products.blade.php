<div class="p-4 bg-white p-6 rounded-xl shadow-md border border-green-500">
@if (session('message'))
<div class="mb-4 p-3 bg-white-400 text-green-700 rounded">
    {{session('message')}}
</div>
@endif
<div class="flex justify-end">
    <button wire:click="openModal" class="px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-700 w-64"> + Add Product</button>
</div>

<div class="mt-6">
  <table class="w-full text-left border">
        <thead class="bg-green-600 text-white">
           <tr>
             <th class="p2">#</th>
              <th class="p-2">Name</th>
              <th class="p-2">Description</th>
              <th class="p-2">Price</th>
              <th class="p-2">Stock</th>
              <th class="p-2 text-center">Action</th>
           </tr>
        </thead>

        <tbody>
          @foreach ($products as $product)
            <tr class="border-b">
                 <td class="p-2">{{$product->id}}</td>
                 <td class="p-2">{{$product->name}}</td>
                 <td class="p-2">{{$product->Description}}</td>
                 <td class="p-2">{{$product->price}}</td>
                 <td class="p-2">{{$product->stock}}</td>
                 <td class="p-2 text-center">
                    <button wire:click="editProduct({{$product->id}})" class="px-3 py-1  text-yellow-500 rounded"> Edit</button>
                  <button wire:click="deleteProduct({{$product->id}})" onclick="confirm('Are you sure?') ||event.stopImmediatePropagation()" class="px-3 py-1  text-red-500 rounded"> Delete</button>
                 </td>
            </tr>
            @endforeach
        </tbody>
  </table>
</div>

{{-- Open Modal Code --}}
@if ($showModal)
<div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 ">
<div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-4">
           <h2>{{$editMode? 'Edit Product' : 'Add Product'}}</h2>

           <button wire:click="closeModal">
            <i class="ri-close-line text-xl"></i>
           </button>
    </div>

    <div class="space-y-3">
         <div>
            <label class="text-gray-600 text-sm" for="">Name</label>
            <input wire:model="name" type="text" class="w-full border rounded-p2">
            @error('name')
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
         </div>

            <div>
            <label class="text-gray-600 text-sm" for="">Description</label>
            <input wire:model="description" type="text" class="w-full border rounded-p2">
            @error('description')
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
         </div>

            <div>
            <label class="text-gray-600 text-sm" for="">Stock</label>
            <input wire:model="stock" type="text" class="w-full border rounded-p2">
            @error('stock')
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
         </div>

            <div>
            <label class="text-gray-600 text-sm" for="">Price</label>
            <input wire:model="price" type="text" class="w-full border rounded-p2">
            @error('price')
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
         </div>

         <div class="mt-4 flex justify-end gap-3">
              <button wire:click="closeModal" class="px-3 bg-gray-500 rounded">
                Cancel
              </button>

              @if ($editMode)
                  <button wire:click="updateProduct" class="px-3 py-2 bg-yellow-500 text-white rounded">
                    Update
                  </button>

              @else
                <button wire:click="saveProduct" class="px-3 py-2 bg-green-500 text-white rounded">
                    Save
                  </button>
              @endif
         </div>
    </div>

</div>
</div>
@endif

</div>