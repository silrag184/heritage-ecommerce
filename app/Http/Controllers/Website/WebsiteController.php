<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;
use App\Models\ProductColorImage;
use App\Models\ShippingArea;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class WebsiteController extends Controller
{
    public function index(){
        $products = Product::with(['category', 'subCategory', 'brand', 'colorImages', 'sizes'])->latest()->where('status', 1)->get();
        $newArrivals = Product::with(['category', 'subCategory', 'brand', 'colorImages', 'sizes'])->latest()->where('status', 1)->where('created_at', '>', now()->subDays(30))->get();
        return view('website.pages.home.index', compact('products', 'newArrivals'));
    }

    public function shopSection(Request $request){
        $products = Product::with(['category', 'subCategory', 'brand', 'colorImages', 'sizes'])->latest()->where('status', 1)->paginate(12);

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

    public function cartProducts(){
        $content = Cart::content();
        $total = Cart::subtotal();
        $items = [];
        $regions = ShippingArea::where('status', 1)->distinct('region')->pluck('region');

        // Get selected shipping region and area from session if available
        $selectedRegion = Session::get('selected_shipping_region');
        $selectedArea = Session::get('selected_shipping_area');

        foreach ($content as $item) {
            $product = Product::find($item->id);
            $price = (float) $item->price;
            $subtotal = $price * $item->qty;
            $items[] = [
                'rowId' => $item->rowId,
                'product_id' => $item->id,
                'product_slug' => $product ? $product->slug : '',
                'product_name' => $item->name,
                'selling_price' => $price,
                'regular_price' => $product ? (float) $product->regular_price : ((float) ($item->options->regular_price ?? 0)),
                'color_id' => $item->options->color_id ?? null,
                'color_name' => $item->options->color_name ?? '',
                'color_code' => $item->options->color_code ?? '',
                'image_path' => $item->options->image_path ?? '',
                'size_id' => $item->options->size_id ?? null,
                'size_name' => $item->options->size_name ?? '',
                'quantity' => $item->qty,
                'subtotal' => $subtotal,
            ];
        }

        return view('website.pages.shop.cart-index', compact('items', 'total', 'regions', 'selectedRegion', 'selectedArea'));
    }

    public function aboutUs(){
        return view('website.pages.about.about-index');
    }

    public function contactUs(){
        return view('website.pages.contact.contact-index');
    }

    public function getShippingRegions(){
        $regions = ShippingArea::where('status', 1)->distinct('region')->pluck('region');
        return response()->json($regions);
    }

    public function getShippingAreas(Request $request){
        $region = $request->region;
        $areas = ShippingArea::where('region', $region)->where('status', 1)->get(['id', 'area_name']);
        return response()->json($areas);
    }

    public function getShippingCost(Request $request){
        $areaId = $request->areaId;
        $area = ShippingArea::find($areaId);
        $cost = $area ? $area->shipping_cost : 0;
        return response()->json(['cost' => $cost]);
    }

    public function saveShippingSelection(Request $request){
        $request->validate([
            'region' => 'nullable|string',
            'area' => 'nullable|integer',
        ]);

        Session::put('selected_shipping_region', $request->region);
        Session::put('selected_shipping_area', $request->area);

        return response()->json(['success' => true]);
    }
}
