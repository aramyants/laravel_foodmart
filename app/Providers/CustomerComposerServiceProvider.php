<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

class CustomerComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $customer = auth('customer')->user();

            if ($customer) {
                $items = Cart::where('customer_id', $customer->id)->get();
                $total = $items->sum(function ($item) {
                    return $item->product->price * $item->quantity;
                });

                $view->with([
                    'customer' => $customer,
                    'items' => $items,
                    'total' => $total
                ]);
            }
        });
    }
}
