<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Your Cart</h1>

        @if(session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @php $cart = session('cart', []); @endphp

        @if(count($cart) > 0)
            @foreach ($cart as $productId => $item)
                <div class="flex justify-between items-center border-b py-4">
                    <div>
                        <h2 class="text-lg font-semibold">{{ $item['name'] }}</h2>
                        <p class="text-gray-600">Quantity: {{ $item['quantity'] }}</p>
                        <p class="text-gray-600">Price: ${{ number_format($item['price'], 2) }}</p>
                    </div>

                    <form action="{{ route('cart.remove', $productId) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                            Remove
                        </button>
                    </form>
                </div>
            @endforeach
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
</x-app-layout>
