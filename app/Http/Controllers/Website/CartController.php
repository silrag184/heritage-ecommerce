<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductColorImage;
use App\Models\Size;
use Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color_id' => 'required|exists:product_color_images,id',
            'size_id' => 'required|exists:sizes,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $productId = $request->product_id;
        $colorId = $request->color_id;
        $sizeId = $request->size_id;
        $quantity = $request->quantity;

        $cart = Session::get('cart', []);

        $cartKey = $productId . '-' . $colorId . '-' . $sizeId;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $product = Product::find($productId);
            $color = ProductColorImage::find($colorId);
            $size = Size::find($sizeId);

            $cart[$cartKey] = [
                'product_id' => $productId,
                'product_slug' => $product->slug,
                'product_name' => $product->product_name,
                'selling_price' => $product->selling_price,
                'regular_price' => $product->regular_price,
                'color_id' => $colorId,
                'color_name' => getColorName($color->color_code),
                'color_code' => $color->color_code,
                'image_path' => $color->image_path,
                'size_id' => $sizeId,
                'size_name' => $size->size_name,
                'quantity' => $quantity,
            ];
        }

        Session::put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart_count' => count($cart),
        ]);
    }

    public function getCart()
    {
        $cart = Session::get('cart', []);
        $total = 0;
        $items = [];

        foreach ($cart as $item) {
            $subtotal = $item['selling_price'] * $item['quantity'];
            $total += $subtotal;
            $items[] = array_merge($item, ['subtotal' => $subtotal]);
        }

        return response()->json([
            'items' => $items,
            'total' => $total,
            'count' => count($cart),
        ]);
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'cart_key' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Session::get('cart', []);
        $cartKey = $request->cart_key;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] = $request->quantity;
            Session::put('cart', $cart);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Item not found']);
    }

    public function removeFromCart(Request $request)
    {
        $request->validate([
            'cart_key' => 'required|string',
        ]);

        $cart = Session::get('cart', []);
        $cartKey = $request->cart_key;

        if (isset($cart[$cartKey])) {
            unset($cart[$cartKey]);
            Session::put('cart', $cart);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Item not found']);
    }
}
