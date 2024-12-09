<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
    public function show(Product $product) {
        return view('product', [
            'product' => $product,
        ]);
    }

    public function addToCart(Request $request, Product $product) {

        $customer = auth()->user(); // Still using the authenticated customer
        $productId = $product->id;
        $quantity = $request->quantity ?? 1;

        Cart::addProductToCart($customer->id, $productId, $quantity);

        return redirect()->back();
    }

    public function removeFromCart($cartId) {
        Cart::removeFromCart($cartId, auth()->user()->id);
        return redirect()->back();
    }
}
