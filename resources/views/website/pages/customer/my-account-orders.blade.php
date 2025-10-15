@extends('website.layout.app')

@section('title')
Orders
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
                        <div class="my-account-content account-order">
                            <div class="wrap-account-order">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="fw-6">Order</th>
                                            <th class="fw-6">Date</th>
                                            <th class="fw-6">Status</th>
                                            <th class="fw-6">Total</th>
                                            <th class="fw-6">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($orders as $order)
                                            <tr class="tf-order-item">
                                                <td>
                                                    #{{ $order->order_number }}
                                                </td>
                                                <td>
                                                    {{ $order->created_at->format('F j, Y') }}
                                                </td>
                                                <td>
                                                    {{ ucfirst($order->status) }}
                                                </td>
                                                <td>
                                                    ৳{{ number_format($order->total, 2) }} for {{ $order->orderDetails->count() }} item{{ $order->orderDetails->count() > 1 ? 's' : '' }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('customer.order-details', $order->order_number) }}"
                                                        class="tf-btn btn-fill animate-hover-btn rounded-0 justify-content-center">
                                                        <span>View</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-4">
                                                    <p class="mb-0">No orders found.</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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