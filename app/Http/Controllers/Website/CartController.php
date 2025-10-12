<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductColorImage;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;

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

        $product = Product::find($productId);
        $color = ProductColorImage::find($colorId);
        $size = Size::find($sizeId);

        $item = Cart::add([
            'id' => $productId,
            'name' => $product->product_name,
            'qty' => $quantity,
            'price' => $product->selling_price,
            'options' => [
                'product_slug' => $product->slug,
                'regular_price' => $product->regular_price,
                'color_id' => $colorId,
                'color_name' => getColorName($color->color_code),
                'color_code' => $color->color_code,
                'image_path' => $color->image_path,
                'size_id' => $sizeId,
                'size_name' => $size->size_name,
            ]
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart_count' => Cart::count(),
            'rowId' => $item->rowId,
        ]);
    }

    public function getCart()
    {
        $content = Cart::content();
        $total = Cart::total();
        $items = [];

        foreach ($content as $item) {
            $price = (float) $item->price;
            $subtotal = $price * $item->qty;
            $items[] = [
                'rowId' => $item->rowId,
                'product_id' => $item->id,
                'product_slug' => $item->options->product_slug,
                'product_name' => $item->name,
                'selling_price' => $price,
                'regular_price' => (float) $item->options->regular_price,
                'color_id' => $item->options->color_id,
                'color_name' => $item->options->color_name,
                'color_code' => $item->options->color_code,
                'image_path' => $item->options->image_path,
                'size_id' => $item->options->size_id,
                'size_name' => $item->options->size_name,
                'quantity' => $item->qty,
                'subtotal' => $subtotal,
            ];
        }

        return response()->json([
            'items' => $items,
            'total' => $total,
            'count' => Cart::count(),
        ]);
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'rowId' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        Cart::update($request->rowId, ['qty' => $request->quantity]);

        return response()->json(['success' => true]);
    }

    public function removeFromCart(Request $request)
    {
        $request->validate([
            'rowId' => 'required|string',
        ]);

        Cart::remove($request->rowId);

        return response()->json(['success' => true]);
    }
}
