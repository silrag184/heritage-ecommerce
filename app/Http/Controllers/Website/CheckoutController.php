<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::content();
        if ($cart->isEmpty()) {
            return redirect()->route('cart.products')->with('error', 'Your cart is empty.');
        }

        $customer = Auth::guard('customer')->user();
        $userData = null;
        if ($customer) {
            $userData = [
                'full_name' => $customer->c_full_name,
                'phone' => $customer->c_phone,
                'email' => $customer->c_email,
                'address' => $customer->c_address,
            ];
        }

        // Get shipping cost from session if available
        $shippingCost = 0;
        if (Session::has('selected_shipping_area')) {
            $areaId = Session::get('selected_shipping_area');
            $area = \App\Models\ShippingArea::find($areaId);
            $shippingCost = $area ? $area->shipping_cost : 0;
        }

        return view('website.pages.checkout.checkout-form', compact('cart', 'userData', 'shippingCost'));
    }

    public function customerMobileCheck(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:15',
        ]);

        $customer = Customer::where('c_phone', $request->phone)->first();

        return response()->json([
            'exists' => $customer ? true : false,
            'customer' => $customer ? [
                'full_name' => $customer->c_full_name,
                'email' => $customer->c_email,
                'address' => $customer->c_address,
            ] : null,
        ]);
    }

    public function newOrder(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'nullable|email',
            'note' => 'nullable|string',
            'shipping_region' => 'required|string',
            'shipping_area' => 'required|integer',
            'shipping_cost' => 'required|numeric',
            'payment_method' => 'required|in:direct_bank_transfer,cash_on_delivery',
        ]);

        $cart = Cart::content();
        if ($cart->isEmpty()) {
            return redirect()->route('cart.products')->with('error', 'Your cart is empty.');
        }

        $subtotal = Cart::subtotal();
        $shippingCost = $request->shipping_cost;
        $total = $subtotal + $shippingCost;

        $customer = Auth::guard('customer')->user();
        $customerId = $customer ? $customer->id : null;

        // Generate unique order number
        $orderNumber = 'ORD-' . time() . '-' . rand(1000, 9999);

        $order = Order::create([
            'customer_id' => $customerId,
            'order_number' => $orderNumber,
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'total' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending',
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'order_notes' => $request->note,
            'shipping_region' => $request->shipping_region,
            'shipping_area_id' => $request->shipping_area,
        ]);

        // Create order details
        foreach ($cart as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'product_slug' => $item->options->product_slug,
                'color_name' => $item->options->color_name ?? null,
                'size_name' => $item->options->size_name ?? null,
                'quantity' => $item->qty,
                'unit_price' => $item->price,
                'total_price' => $item->subtotal,
                'image_path' => $item->options->image_path,
            ]);
        }

        // Clear the cart
        Cart::destroy();

        return redirect()->route('complete-order', ['order_number' => $orderNumber])->with('success', 'Order placed successfully!');
    }

    public function completeOrder(Request $request)
    {
        $orderNumber = $request->query('order_number');
        $order = Order::where('order_number', $orderNumber)->first();

        if (!$order) {
            return redirect()->route('home')->with('error', 'Order not found.');
        }

        return view('website.pages.checkout.complete-order', compact('order'));
    }
}
