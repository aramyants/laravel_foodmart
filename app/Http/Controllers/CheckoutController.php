<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function index()
    {
        $total = Cart::getTotal();
        return view('checkout', compact('total'));
    }


    public function store(Request $request)
    {
        // Validation rules for order
        $validator = Validator::make($request->all(), [
            'company_name' => 'nullable|string|max:255',
            'country_region' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'apartment_suite' => 'nullable|string|max:255',
            'town_city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            // If validation fails, redirect back with errors and input
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            $customerId = auth()->user()->id;

            // Create the order
            $order = Order::create([
                ...$request->only([
                    'company_name',
                    'country_region',
                    'street_address',
                    'apartment_suite',
                    'town_city',
                    'state',
                    'zip_code',
                ]),
                'customer_id' => $customerId, // Adding the customer_id field correctly
            ]);

            $items = Cart::where('customer_id', $customerId)->get();

            // Create the products related to the order
            foreach ($items as $item) {
                $order->products()->create([
                    'product_name' => $item->product->name,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            // Redirect to /account with success message
            return redirect('/account')->with('success', 'Order has been successfully created!');
        } catch (\Exception $e) {
            // If an error occurs, redirect back with a failure message
            return redirect()->back()->with('error', 'Something went wrong while processing your order.');
        }
    }
}
