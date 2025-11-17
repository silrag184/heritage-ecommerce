@extends('admin-panel.layout.app')

@section('title', 'Order Invoice')

@section('admin-content')
<style>
    .invoice-box {
        background: #ffffff;
        padding: 40px;
        border-radius: 8px;
        border: 1px solid #dcdcdc;
        box-shadow: 0 3px 12px rgba(0,0,0,0.05);
    }
    .invoice-header {
        border-bottom: 2px solid #e5e5e5;
        padding-bottom: 15px;
        margin-bottom: 25px;
    }
    .invoice-table th {
        background: #f7f7f7;
    }
    .summary-table th {
        background: #f4f4f4;
    }

    @media print {
        .no-print {
            display: none !important;
            visibility: hidden !important;
        }
    }
</style>

<div class="app-content main-content mt-0">
    <div class="side-app">

        <div class="main-container container-fluid">

            <div class=" no-print page-header d-flex justify-content-between ">
                <h1 class="page-title">Order Invoice</h1>
                <div class="btn-group">
                    <a href="{{ route('orders.invoice.download', $order->id) }}" class="btn btn-success">
                        <i class="fa fa-download"></i> Download PDF
                    </a>

                    <a href="javascript:window.print();" class="btn btn-primary">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>

            <div class="invoice-box">
                <!-- HEADER -->
                <div class="invoice-header d-flex justify-content-between align-items-center">
                    <img src="{{ asset('/') }}backend/assets/images/brand/logo.svg"
                         alt="Logo"
                         style="height:60px;">

                    <div class="text-end">
                        <h4 class="mb-1">Invoice #{{ $order->order_number }}</h4>
                        <small>Date: {{ $order->created_at->format('d M Y') }}</small>
                    </div>
                </div>

                <!-- CUSTOMER INFO -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5><strong>Billing Information:</strong></h5>
                        <p>
                            <strong>Name:</strong> {{ $order->full_name }}<br>
                            <strong>Phone:</strong> {{ $order->phone }}<br>
                            <strong>Email:</strong> {{ $order->email ?? 'N/A' }}<br>
                            <strong>Address:</strong> {{ $order->address }}<br>
                            <strong>Region:</strong> {{ $order->shipping_region }}
                        </p>
                    </div>

                    <div class="col-md-6 text-end">
                        <h5><strong>Order Details:</strong></h5>
                        <p>
                            <strong>Status:</strong> {{ ucfirst($order->status) }}<br>
                            <strong>Payment Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}<br>
                            <strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}
                        </p>
                    </div>
                </div>

                <!-- ORDER ITEMS TABLE -->
                <div class="table-responsive">
                    <table class="table table-bordered invoice-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderDetails as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->color_name ?? '-' }}</td>
                                    <td>{{ $item->size_name ?? '-' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->unit_price, 2) }} BDT</td>
                                    <td>{{ number_format($item->total_price, 2) }} BDT</td>
                                    <td>
                                        @if ($item->image_path)
                                            <img src="{{ asset($item->image_path) }}" width="45" height="45" style="object-fit:cover">
                                        @else
                                            <img src="https://placehold.co/45" width="45">
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- PRICE SUMMARY -->
                <div class="row justify-content-end mt-4">
                    <div class="col-md-4">
                        <table class="table table-bordered summary-table">
                            <tr>
                                <th>Subtotal</th>
                                <td>{{ number_format($order->subtotal, 2) }} BDT</td>
                            </tr>
                            <tr>
                                <th>Shipping</th>
                                <td>{{ number_format($order->shipping_cost, 2) }} BDT</td>
                            </tr>
                            <tr class="table-active">
                                <th>Total</th>
                                <td><strong>{{ number_format($order->total, 2) }} BDT</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($order->order_notes)
                <div class="mt-4">
                    <h5><strong>Order Notes:</strong></h5>
                    <p>{{ $order->order_notes }}</p>
                </div>
                @endif

            </div>

        </div>
    </div>
</div>
@endsection
