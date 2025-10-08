<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class WebsiteController extends Controller
{
    public function index(){
        $products = Product::with(['category', 'subCategory', 'brand', 'colorImages', 'sizes'])->where('status', 1)->get();
        $newArrivals = Product::with(['category', 'subCategory', 'brand', 'colorImages', 'sizes'])->where('status', 1)->where('created_at', '>', now()->subDays(30))->get();
        return view('website.pages.home.index', compact('products', 'newArrivals'));
    }

    public function shopSection(){
        $filter = request('filter');
        $query = Product::with(['category', 'subCategory', 'brand', 'colorImages', 'sizes'])->where('status', 1);
        if ($filter == 'new_arrival') {
            $query->where('created_at', '>', now()->subDays(30));
        }
        $products = $query->get();
        return view('website.pages.shop.shop-index', compact('products'));
    }

    public function aboutUs(){
        return view('website.pages.about.about-index');
    }

    public function contactUs(){
        return view('website.pages.contact.contact-index');
    }
}
