{{-- resources/views/checkout/index.blade.php --}}
<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Checkout</h1>

        <form action="{{ route('checkout.process') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="shipping_address" class="block font-semibold">Shipping Address:</label>
                <textarea name="shipping_address" id="shipping_address" rows="3" required class="w-full border rounded p-2"></textarea>
            </div>

            <div>
                <label class="block font-semibold mb-2">Payment Method:</label>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="radio" name="payment_method" value="credit_card" required class="mr-2">
                        Credit Card
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="payment_method" value="paypal" required class="mr-2">
                        PayPal
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="payment_method" value="cod" required class="mr-2">
                        Cash on Delivery
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Place Order
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
