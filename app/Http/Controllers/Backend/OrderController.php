<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderDetails')
            ->orderByRaw("FIELD(status, 'pending', 'processing', 'shipped', 'delivered', 'cancelled')")
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin-panel.pages.orders.index', compact('orders'));
    }

    public function pendingOrders()
    {
        $orders = Order::with('orderDetails')
            ->where('status', 'pending')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin-panel.pages.orders.pending', compact('orders'));
    }

    public function shippedOrders()
    {
        $orders = Order::with('orderDetails')
            ->where('status', 'shipped')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin-panel.pages.orders.shipped', compact('orders'));
    }

    public function deliveredOrders()
    {
        $orders = Order::with('orderDetails')
            ->where('status', 'delivered')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin-panel.pages.orders.delivered', compact('orders'));
    }


    public function viewInvoice($id)
    {
        $order = Order::with('orderDetails')->findOrFail($id);

        return view('admin-panel.pages.orders.invoice', compact('order'));
    }

    // public function downloadInvoice($id)
    // {
    //     $order = Order::with('orderDetails')->findOrFail($id);
    //     $pdf = PDF::loadView('admin-panel.pages.orders.invoice-pdf', compact('order'))->setPaper('a4', 'portrait');
    //     return $pdf->download($order->order_number.'.pdf');
    // }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->orderDetails()->delete();
        $order->delete();

        return redirect()->back()->with([
            'message' => 'Order deleted successfully!',
            'alert-type' => 'success'
        ]);
    }
}
