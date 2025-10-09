<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;
use App\Models\ProductColorImage;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index(){
        $products = Product::with(['category', 'subCategory', 'brand', 'colorImages', 'sizes'])->where('status', 1)->get();
        $newArrivals = Product::with(['category', 'subCategory', 'brand', 'colorImages', 'sizes'])->where('status', 1)->where('created_at', '>', now()->subDays(30))->get();
        return view('website.pages.home.index', compact('products', 'newArrivals'));
    }

    public function shopSection(Request $request){
        $products = Product::with(['category', 'subCategory', 'brand', 'colorImages', 'sizes'])->where('status', 1)->paginate(12);

        //delete this code section if pagination.blade.php and products.blade.php is removed. (Of course use backup file if you don't like thhis pagination system)
        if ($request->ajax()) {
            $layout = $request->get('layout', 'grid'); // default to grid
            $productsHtml = view('website.pages.shop.partials.products', compact('products', 'layout'))->render();
            $paginationHtml = view('website.pages.shop.partials.pagination', compact('products', 'layout'))->render();
            return response()->json([
                'products_html' => $productsHtml,
                'pagination_html' => $paginationHtml,
            ]);
        }
        //eituku line. I hope Silrag will remember and understand about this section.

        return view('website.pages.shop.shop-index', compact('products'));
    }

    public function shopDetails($slug){
        $product = Product::with(['category', 'subCategory', 'brand', 'colorImages', 'sizes', 'tags'])->where('slug', $slug)->where('status', 1)->firstOrFail();
        
        $colorName = null;
        if ($product->colorImages->isNotEmpty()) {
            $firstColorCode = $product->colorImages->first()->color_code;
            $colorName = getColorName($firstColorCode);
        }
        
        return view('website.pages.shop.shop-details', compact('product', 'colorName'));
    }

    public function aboutUs(){
        return view('website.pages.about.about-index');
    }

    public function contactUs(){
        return view('website.pages.contact.contact-index');
    }
}
