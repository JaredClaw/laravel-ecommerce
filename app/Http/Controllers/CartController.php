<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
     public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // Check if product already in cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function view()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function remove(Request $request, $productId)
    {
    $cart = session()->get('cart', []);
    $quantityToRemove = (int) $request->input('quantity', 1);

    if (isset($cart[$productId])) {
        if ($cart[$productId]['quantity'] > $quantityToRemove) {
            $cart[$productId]['quantity'] -= $quantityToRemove;
        } else {
            unset($cart[$productId]); // remove entire item if quantity goes to 0 or below
        }

        session()->put('cart', $cart);
    }

        return redirect()->route('cart.view')->with('success', 'Item updated in cart.');
    }

}
