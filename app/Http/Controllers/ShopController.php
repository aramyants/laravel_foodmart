<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Carbon\Carbon;

class ShopController extends Controller
{
    public function index(Request $request) {
        $categories = Category::where('status', 'active')->get();
        $brands = Brand::where('is_active', 1)->get();

        $products = Product::where('release_date', '<=', Carbon::today());

        if ($request->has('category') && $request->category != '') {
            $products->where('category_id', $request->category);
            $activeCategory = Category::find($request->category);
        }

        if ($request->has('brand') && $request->brand != '') {
            $products->where('brand_id', $request->brand);
        }

        if ($request->has('minPrice') && $request->minPrice != '') {
            $products->where('price', '>=', $request->minPrice);
        }

        if ($request->has('maxPrice') && $request->maxPrice != '') {
            $products->where('price', '<=', $request->maxPrice);
        }

        if ($request->has('search') && $request->search != '') {
            $products->where('name', 'LIKE', '%' . $request->search . '%');
        }

        $products = $products->paginate(12);

        return view('shop', [
            'categories' => $categories,
            'activeCategory' => $activeCategory ?? null,
            'brands' => $brands,
            'products' => $products,
            'search' => $request->search
        ]);
    }

}
