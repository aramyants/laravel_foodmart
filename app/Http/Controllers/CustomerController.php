<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function account()
    {
        $customer = auth()->user(); // Retrieve the logged-in customer
        return view('account', compact('customer')); // Pass the customer data to the view
    }
}
