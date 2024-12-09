<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'logo', 'description', 'website', 'established', 'origin_country', 'is_active'
    ];

    // Optional: Define slug generation
    public static function boot()
    {
        parent::boot();

        static::creating(function ($brand) {
            $brand->slug = \Str::slug($brand->name);
        });
    }
}
