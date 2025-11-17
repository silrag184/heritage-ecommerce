<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $order->order_number }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .header img {
            height: 70px;
        }
        .title {
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }
        table th {
            background: #f3f3f3;
            padding: 8px;
            border: 1px solid #ddd;
        }
        table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .summary th {
            width: 60%;
            background: #eee;
        }
    </style>
</head>
<body>

<div class="header">
    <img src="{{ asset('/') }}backend/assets/images/brand/logo.svg" alt="Logo">

    <div class="title">
        <h2>Invoice #{{ $order->order_number }}</h2>
        <small>Date: {{ $order->created_at->format('d M Y') }}</small>
    </div>
</div>

<h3>Customer Information</h3>
<p>
    <strong>Name:</strong> {{ $order->full_name }}<br>
    <strong>Phone:</strong> {{ $order->phone }}<br>
    <strong>Email:</strong> {{ $order->email ?? 'N/A' }}<br>
    <strong>Address:</strong> {{ $order->address }}<br>
    <strong>Region:</strong> {{ $order->shipping_region }}
</p>

<h3>Order Items</h3>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Color</th>
            <th>Size</th>
            <th>Qty</th>
            <th>Unit</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->orderDetails as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->color_name ?? '-' }}</td>
            <td>{{ $item->size_name ?? '-' }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ number_format($item->unit_price, 2) }}</td>
            <td>{{ number_format($item->total_price, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Summary</h3>
<table class="summary">
    <tr>
        <th>Subtotal</th>
        <td>{{ number_format($order->subtotal, 2) }}</td>
    </tr>
    <tr>
        <th>Shipping Cost</th>
        <td>{{ number_format($order->shipping_cost, 2) }}</td>
    </tr>
    <tr>
        <th><strong>Total</strong></th>
        <td><strong>{{ number_format($order->total, 2) }}</strong></td>
    </tr>
</table>

@if($order->order_notes)
<h3>Order Notes</h3>
<p>{{ $order->order_notes }}</p>
@endif

</body>
</html>
