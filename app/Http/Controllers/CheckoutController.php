<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Show checkout form.
     */
    public function index()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', compact('cart'));
    }

    /**
     * Process checkout form submission.
     */
    public function process(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'payment_method' => 'required|in:credit_card,paypal,cod',
        ]);

        // In a full app, you would save the order and items here:
        // Order::create([...]);

        Session::forget('cart'); // Clear the cart

        return redirect()->route('dashboard')->with('success', 'Order placed successfully!');
    }
}
