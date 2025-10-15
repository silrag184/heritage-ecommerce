@extends('website.layout.app')

@section('title')
Order Details
@endsection

@section('content')
 <!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">My Orders</div>
            </div>
        </div>
        <!-- /page-title -->

        <!-- page-cart -->
        <section class="flat-spacing-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="wrap-sidebar-account">
                            <ul class="my-account-nav">
                                <li><a href="{{ route('customer.dashboard') }}" class="my-account-nav-item ">Dashboard</a></li>
                                <li><span class="my-account-nav-item active"><a href="{{ route('customer.orders') }}">Orders</a></span></li>
                                <li><a href="{{ route('customer.address') }}" class="my-account-nav-item">Address</a></li>
                                <li><a href="{{ route('customer.profile') }}" class="my-account-nav-item">Account Details</a></li>
                                <li><a href="{{ route('customer.wishlist.show') }}" class="my-account-nav-item">Wishlist</a></li>
                                <li><a href="{{ route('customer.logout') }}" class="my-account-nav-item">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="wd-form-order">
                            <div class="order-head">
                                <figure class="img-product">
                                    <img src="{{ asset($order->orderDetails->first() ? $order->orderDetails->first()->image_path : 'images/products/default.jpg') }}" alt="product">
                                </figure>
                                <div class="content">
                                    <div class="badge">{{ ucfirst($order->status) }}</div>
                                    <h6 class="mt-8 fw-5">Order #{{ $order->order_number }}</h6>
                                </div>
                            </div>
                            <div class="tf-grid-layout md-col-2 gap-15">
                                <div class="item">
                                    <div class="text-2 text_black-2">Order Date</div>
                                    <div class="text-2 mt_4 fw-6">{{ $order->created_at->format('d F Y, H:i:s') }}</div>
                                </div>
                                <div class="item">
                                    <div class="text-2 text_black-2">Payment Method</div>
                                    <div class="text-2 mt_4 fw-6">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</div>
                                </div>
                                <div class="item">
                                    <div class="text-2 text_black-2">Shipping Region</div>
                                    <div class="text-2 mt_4 fw-6">{{ $order->shipping_region }}</div>
                                </div>
                                <div class="item">
                                    <div class="text-2 text_black-2">Shipping Address</div>
                                    <div class="text-2 mt_4 fw-6">{{ $order->address }}</div>
                                </div>
                            </div>
                            <div class="widget-tabs style-has-border widget-order-tab">
                                <ul class="widget-menu-tab">
                                    <li class="item-title active">
                                        <span class="inner">Order History</span>
                                    </li>
                                    <li class="item-title">
                                        <span class="inner">Item Details</span>
                                    </li>
                                    <li class="item-title">
                                        <span class="inner">Courier</span>
                                    </li>
                                    <li class="item-title">
                                        <span class="inner">Receiver</span>
                                    </li>
                                </ul>
                                <div class="widget-content-tab">
                                    <div class="widget-content-inner active">
                                        <div class="widget-timeline">
                                            <ul class="timeline">
                                                <li>
                                                    <div class="timeline-badge success"></div>
                                                    <div class="timeline-box">
                                                        <a class="timeline-panel" href="javascript:void(0);">
                                                            <div class="text-2 fw-6">Product Shipped</div>
                                                            <span>10/07/2024 4:30pm</span>
                                                        </a>
                                                        <p><strong>Courier Service : </strong>FedEx World Service Center
                                                        </p>
                                                        <p><strong>Estimated Delivery Date : </strong>12/07/2024</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="timeline-badge success"></div>
                                                    <div class="timeline-box">
                                                        <a class="timeline-panel" href="javascript:void(0);">
                                                            <div class="text-2 fw-6">Product Shipped</div>
                                                            <span>10/07/2024 4:30pm</span>
                                                        </a>
                                                        <p><strong>Tracking Number : </strong>2307-3215-6759</p>
                                                        <p><strong>Warehouse : </strong>T-Shirt 10b</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="timeline-badge"></div>
                                                    <div class="timeline-box">
                                                        <a class="timeline-panel" href="javascript:void(0);">
                                                            <div class="text-2 fw-6">Product Packaging</div>
                                                            <span>12/07/2024 4:34pm</span>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="timeline-badge"></div>
                                                    <div class="timeline-box">
                                                        <a class="timeline-panel" href="javascript:void(0);">
                                                            <div class="text-2 fw-6">Order Placed</div>
                                                            <span>11/07/2024 2:36pm</span>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget-content-inner">
                                        @foreach($order->orderDetails as $detail)
                                            <div class="order-head mb_20">
                                                <figure class="img-product">
                                                    <img src="{{ asset($order->orderDetails->first() ? $order->orderDetails->first()->image_path : 'images/products/default.jpg') }}" alt="product">
                                                </figure>
                                                <div class="content">
                                                    <div class="text-2 fw-6">Name: {{ $detail->product_name }}</div>
                                                    <div class="mt_4"><span class="fw-6">Price :</span> ৳{{ number_format($detail->unit_price, 2) }}</div>
                                                    <div class="mt_4"><span class="fw-6">Quantity :</span> {{ $detail->quantity }}</div>
                                                    @if($detail->color_name)
                                                        <div class="mt_4"><span class="fw-6">Color :</span> {{ $detail->color_name }}</div>
                                                    @endif
                                                    @if($detail->size_name)
                                                        <div class="mt_4"><span class="fw-6">Size :</span> {{ $detail->size_name }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                        <ul>
                                            <li class="d-flex justify-content-between text-2">
                                                <span>Subtotal</span>
                                                <span class="fw-6">৳{{ number_format($order->subtotal, 2) }}</span>
                                            </li>
                                            <li class="d-flex justify-content-between text-2 mt_4 pb_8 line">
                                                <span>Shipping</span>
                                                <span class="fw-6">৳{{ number_format($order->shipping_cost, 2) }}</span>
                                            </li>
                                            <li class="d-flex justify-content-between text-2 mt_8">
                                                <span>Order Total</span>
                                                <span class="fw-6">৳{{ number_format($order->total, 2) }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="widget-content-inner">
                                        <p>Our courier service is dedicated to providing fast, reliable, and secure
                                            delivery solutions tailored to meet your needs. Whether you're sending
                                            documents, parcels, or larger shipments, our team ensures that your items
                                            are handled with the utmost care and delivered on time. With a commitment to
                                            customer satisfaction, real-time tracking, and a wide network of routes, we
                                            make it easy for you to send and receive packages both locally and
                                            internationally. Choose our service for a seamless and efficient delivery
                                            experience.</p>
                                    </div>
                                    <div class="widget-content-inner">
                                        <p class="text-2 text_success">Thank you Your order has been received</p>
                                        <ul class="mt_20">
                                            <li>Order Number : <span class="fw-7">#{{ $order->order_number }}</span></li>
                                            <li>Date : <span class="fw-7">{{ $order->created_at->format('d/m/Y, H:i') }}</span></li>
                                            <li>Total : <span class="fw-7">৳{{ number_format($order->total, 2) }}</span></li>
                                            <li>Payment Methods : <span class="fw-7">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-cart -->

        <div class="btn-sidebar-account">
            <button data-bs-toggle="offcanvas" data-bs-target="#mbAccount" aria-controls="offcanvas"><i
                    class="icon icon-sidebar-2"></i></button>
        </div>
@endsection