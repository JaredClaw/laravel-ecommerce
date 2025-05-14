<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6 text-white">🛒 Your Shopping Cart</h1>

        @php
            $totalItems = 0;
            $totalCost = 0;
        @endphp

        @if (count($cart) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pb-40">
                @foreach ($cart as $id => $item)
                    @php
                        $totalItems += $item['quantity'];
                        $totalCost += $item['price'] * $item['quantity'];
                    @endphp

                    <div class="bg-white rounded-lg shadow p-4">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $item['name'] }}</h2>
                        <p class="text-gray-600 mb-1">Price: ${{ number_format($item['price'], 2) }}</p>
                        <p class="text-gray-600 mb-3">In Cart: <span class="font-medium">{{ $item['quantity'] }}</span></p>

                        <form action="{{ route('cart.remove', $id) }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            @method('DELETE')
                            <input type="number" name="quantity" min="1" max="{{ $item['quantity'] }}" value="1"
                                class="w-16 px-2 py-1 border border-gray-300 rounded text-gray-700 text-sm focus:ring focus:ring-blue-200">
                            <button type="submit"
                                class="bg-red-600 text-white px-3 py-1 text-sm rounded hover:bg-red-700 transition">
                                Remove
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Fixed Checkout Box -->
            <div class="fixed bottom-4 left-4 bg-white shadow-lg rounded-lg p-4 w-72 z-50">
                <h2 class="text-lg font-bold text-gray-800 mb-2">Checkout Summary</h2>
                <p class="text-gray-700 mb-1">Total Items: <strong>{{ $totalItems }}</strong></p>
                <p class="text-gray-700 mb-4">Total Cost: <strong>${{ number_format($totalCost, 2) }}</strong></p>

                <a href="{{ route('checkout') }}"
                   class="block w-full text-center bg-green-600 text-white py-2 rounded text-md font-semibold hover:bg-green-700 transition">
                    Proceed to Checkout
                </a>
            </div>
        @else
            <div class="bg-white rounded-lg shadow p-6 text-center text-gray-600">
                Your cart is empty.
            </div>
        @endif
    </div>
</x-app-layout>
