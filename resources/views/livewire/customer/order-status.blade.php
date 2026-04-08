<div>
    <h1 class="text-xl font-bold mb-4 text-gray-600">Your Orders</h1>
    @if ($orders && $orders->count())
    <table class="w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-green-600 text-white">
            <tr>
            <th class="px-4 py-2 text-left">Order ID</th>
            <th class="px-4 py-2 text-left">Product</th>
            <th class="px-4 py-2 text-left">Amount</th>
            <th class="px-4 py-2 text-left">Status</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="border-b">
                <td class="px-4 py-2">
                    {{$order->id}}
                </td>
                <td class="px-4 py-2">
                    {{$order->product->name}}
                </td>
                <td class="px-4 py-2">
                    {{$order->product->price * $order->quantity, 2}}
                </td>

                <td class="px-2 py-2">
                    <span class="px-3 py-1 rounded-full text-white text-sm
                        @if ($order->status==='pending') bg-yellow-500
                        @elseif($order->status==='completed') bg-green-500
                        @else bg-gray-100 text-gray-600
                        @endif
                        ">
                        {{ucfirst($order->status)}}
                </span>
                    </td>
            </tr>  
            @endforeach
        </tbody>
    </table>
    @else
    <p class="text-gray-500 text-center py-4">No Orders Found</p>
    @endif
</div>
