<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index() {
        $categories = Category::where('status', 'active')->get();
        $brands = Brand::where('is_active', 1)->get();
        $banners = Banner::where('is_active', 1)->get();

        return view('index', [
            'categories' => $categories,
            'brands' => $brands,
            'banners' => $banners,
        ]);
    }

    public function showAbout() {
        return view('about');
    }

    public function showContact() {
        return view(view: 'contact');
    }
}
