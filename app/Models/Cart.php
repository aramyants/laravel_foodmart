<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',      // Link to the user (if applicable)
        'product_id',   // Link to the product
        'quantity',     // Quantity of the product added
    ];

    // Define relationship with the User model (optional)
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Define relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function addProductToCart($customerId, $productId, $quantity)
    {
        // Check if the product is already in the cart for this customer
        $cart = self::where('customer_id', $customerId)
                    ->where('product_id', $productId)
                    ->first();

        if ($cart) {
            // If the product exists in the cart, update the quantity
            $cart->quantity += $quantity;
            $cart->save();
        } else {
            // If the product does not exist, create a new cart entry
            self::create(attributes: [
                'customer_id' => $customerId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return $cart;
    }

    public static function getTotal() {
        $customerId = auth()->user()->id;
        // Retrieve all items for the given customer_id
        $items = self::where('customer_id', $customerId)->get();

        // Calculate the total price
        $total = $items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return $total;
    }

    public static function removeFromCart($cartId, $customerId) {
        return self::where('id', $cartId)
                   ->where('customer_id', $customerId)
                   ->delete();
    }
}
