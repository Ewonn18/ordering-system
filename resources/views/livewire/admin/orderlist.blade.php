<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4 text-gray-500">Order list</h1>
    <table class="w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-green-600 text-white">
            <tr>
            <th class="px-4 py-2 text-left">Customer</th>
            <th class="px-4 py-2 text-left">Phone Number</th>
            <th class="px-4 py-2 text-left">Product</th>
            <th class="px-4 py-2 text-left">Quantity</th>
            <th class="px-4 py-2 text-left">Total</th>
            <th class="px-4 py-2 text-left">Status</th>
            <th class="px-4 py-2 text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="border-b">
                <td class="px-4 py-2">
                    {{$order->user->name}}
                </td>
                <td class="px-4 py-2">
                    {{$order->user->phone_number}}
                </td>
                <td class="px-4 py-2">
                    {{$order->product->name}}
                </td>
                <td class="px-4 py-2">
                    {{$order->quantity}}
                </td>
                <td class="px-4 py-2">
                    {{$order->total_price}}
                </td>

                <td class="px-2 py-2">
                    <span class="px-3 py-1 rounded-full text-white text-sm
                        @if ($order->status==='pending') bg-yellow-500
                        @elseif($order->status==='Approved') bg-green-500
                        @elseif($order->status==='Declined') bg-red-500
                        @endif">
                        {{$order->status}}
                    </span>
                </td>
                <td class="px-4 py-2 text-center flex justify-center gap-3">

                        @if($order->status === 'pending')
                            <button
                                wire:click="approve({{ $order->id }})"
                                class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                Approve
                            </button>

                            <button
                                wire:click="decline({{ $order->id }})"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                Decline
                            </button>
                        @else
                            <span class="text-gray-500">Completed</span>
                        @endif

                    </td>
            </tr>  
            @endforeach
        </tbody>
    </table>
</div>
