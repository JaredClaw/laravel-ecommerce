<x-app-layout>
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <h1 class="text-2xl font-bold mb-2">Welcome to Our Store, {{ Auth::user()->name }}!</h1>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Our Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($products as $product)
                <div class="bg-gray-50 rounded-lg shadow p-4 text-center">
                    <img src="{{ $product->image_url ?? 'hanako.png/300x200' }}" alt="{{ $product->name }}" class="w-full h-40 object-cover rounded mb-2">
                    <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $product->description }}</p>
                    <p class="text-green-600 font-bold mt-2">${{ number_format($product->price, 2) }}</p>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="mt-3 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 w-full">
                            Add to Cart
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
