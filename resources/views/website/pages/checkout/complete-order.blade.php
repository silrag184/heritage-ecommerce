@extends('website.layout.app')

@section('title')
    Order Completed Successfully
@endsection

@section('content')
    <!-- page-title -->
    <div class="tf-page-title">
        <div class="container-full">
            <div class="heading text-center">Order Completed</div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- page-cart -->
    <section class="flat-spacing-11">
        <div class="container">
            <div class="tf-page-cart-wrap">
                <div class="tf-page-cart-item">
                    <div class="order-success-message text-center mb_40">
                        <div class="icon-success mb_20">
                            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="40" cy="40" r="40" fill="#4CAF50"/>
                                <path d="M26 40L36 50L54 32" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3 class="fw-6 mb_10">Thank you for your order!</h3>
                        <p class="text_black-2">Your order has been successfully placed. You will receive an email confirmation shortly.</p>
                    </div>

                    <div class="order-details">
                        <h5 class="fw-5 mb_20">Order Details</h5>
                        <div class="order-info mb_30">
                            <div class="d-flex justify-content-between mb_10">
                                <span class="text_black-2">Order Number:</span>
                                <span class="fw-5">#{{ $order->order_number }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb_10">
                                <span class="text_black-2">Order Date:</span>
                                <span class="fw-5">{{ $order->created_at->format('M d, Y') }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb_10">
                                <span class="text_black-2">Payment Method:</span>
                                <span class="fw-5">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb_10">
                                <span class="text_black-2">Status:</span>
                                <span class="fw-5 text-success">{{ ucfirst($order->status) }}</span>
                            </div>
                        </div>

                        <div class="order-summary">
                            <h6 class="fw-5 mb_20">Order Summary</h6>
                            <ul class="wrap-checkout-product mb_20">
                                @foreach($order->orderDetails as $detail)
                                    <li class="checkout-product-item">
                                        <figure class="img-product">
                                            <img src="{{ asset($detail->image_path) }}" alt="product">
                                            <span class="quantity">{{ $detail->quantity }}</span>
                                        </figure>
                                        <div class="content">
                                            <div class="info">
                                                <p class="name">{{ $detail->product_name }}</p>
                                                @if($detail->color_name || $detail->size_name)
                                                    <span class="variant">{{ $detail->color_name }} / {{ $detail->size_name }}</span>
                                                @endif
                                            </div>
                                            <span class="price">৳{{ number_format($detail->total_price, 2) }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="d-flex justify-content-between line pb_10">
                                <h6 class="fw-5">Subtotal</h6>
                                <h6 class="fw-5">৳{{ number_format($order->subtotal, 2) }}</h6>
                            </div>
                            <div class="d-flex justify-content-between line pb_10">
                                <h6 class="fw-5">Shipping</h6>
                                <h6 class="fw-5">৳{{ number_format($order->shipping_cost, 2) }}</h6>
                            </div>
                            <div class="d-flex justify-content-between line pb_10">
                                <h6 class="fw-5">Total</h6>
                                <h6 class="total fw-5">৳{{ number_format($order->total, 2) }}</h6>
                            </div>
                        </div>

                        <div class="shipping-address mt_30">
                            <h6 class="fw-5 mb_20">Shipping Address</h6>
                            <div class="address-info">
                                <p class="mb_5"><strong>{{ $order->first_name }}</strong></p>
                                <p class="mb_5">{{ $order->address }}</p>
                                <p class="mb_5">{{ $order->city }}, {{ $order->country }}</p>
                                <p class="mb_5">{{ $order->phone }}</p>
                                @if($order->email)
                                    <p class="mb_5">{{ $order->email }}</p>
                                @endif
                            </div>
                        </div>

                        @if($order->order_notes)
                            <div class="order-notes mt_30">
                                <h6 class="fw-5 mb_20">Order Notes</h6>
                                <p class="text_black-2">{{ $order->order_notes }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="tf-page-cart-footer">
                    <div class="tf-cart-footer-inner">
                        <div class="text-center">
                            <p class="text_black-2 mb_20">You can track your order status from your account dashboard.</p>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="{{ route('customer.dashboard') }}" class="tf-btn btn-fill animate-hover-btn">View My Orders</a>
                                <a href="{{ route('home') }}" class="tf-btn radius-3 btn-line">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-cart -->
@endsection
