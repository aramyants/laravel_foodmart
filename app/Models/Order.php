<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'company_name',
        'country_region',
        'street_address',
        'apartment_suite',
        'town_city',
        'state',
        'zip_code',
    ];

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    // You can also add relationships to the User model if needed
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
