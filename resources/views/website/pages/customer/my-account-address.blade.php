@extends('website.layout.app')

@section('title')
My Address
@endsection

@section('content')
<!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Address</div>
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
                                <li><a href="{{ route('customer.orders') }}" class="my-account-nav-item">Orders</a></li>
                                <li><span class="my-account-nav-item active"><a href="{{ route('customer.address') }}">Address</a></span></li>
                                <li><a href="{{ route('customer.profile') }}" class="my-account-nav-item">Account Details</a></li>
                                <li><a href="{{ route('customer.wishlist.show') }}" class="my-account-nav-item">Wishlist</a></li>
                                <li><a href="{{ route('customer.logout') }}" class="my-account-nav-item">Logout</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-9">
                        <div class="my-account-content account-address">
                            <div class="text-center widget-inner-address">
                                <div class="list-account-address">
                                    <div class="account-address-item">
                                        <h6 class="mb_20">Current Address</h6>
                                        @if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->c_address)
                                            <p>{{ Auth::guard('customer')->user()->c_full_name }}</p>
                                            <p>{{ Auth::guard('customer')->user()->c_address }}</p>
                                            <p>{{ Auth::guard('customer')->user()->c_phone }}</p>
                                            @if(Auth::guard('customer')->user()->c_email)
                                                <p>{{ Auth::guard('customer')->user()->c_email }}</p>
                                            @endif
                                        @else
                                            <p class="text-muted">No address saved yet.</p>
                                            <p class="text-muted">Please add your address below.</p>
                                        @endif
                                        <div class="d-flex gap-10 justify-content-center">
                                            <button
                                                class="tf-btn btn-fill animate-hover-btn justify-content-center btn-edit-address">
                                                <span>{{ Auth::guard('customer')->check() && Auth::guard('customer')->user()->c_address ? 'Edit' : 'Add' }}</span>
                                            </button>
                                            @if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->c_address)
                                                <button class="tf-btn btn-outline animate-hover-btn justify-content-center btn-delete-address">
                                                    <span>Delete</span>
                                                </button>
                                            @endif
                                        </div>
                                        <form class="edit-form-address wd-form-address" id="formeditAddress" action="{{ route('customer.update-address') }}" method="POST">
                                            @csrf
                                            <div class="title">{{ Auth::guard('customer')->check() && Auth::guard('customer')->user()->c_address ? 'Edit' : 'Add' }} address</div>
                                            <div class="box-field">
                                                <div class="tf-field style-1">
                                                    <input class="tf-field-input tf-input" placeholder=" " type="text"
                                                        id="addressEdit" name="c_address" value="{{ Auth::guard('customer')->check() ? Auth::guard('customer')->user()->c_address : '' }}" required>
                                                    <label class="tf-field-label fw-4 text_black-2"
                                                        for="addressEdit">Address</label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center gap-20">
                                                <button type="submit" class="tf-btn btn-fill animate-hover-btn">Update
                                                    address</button>
                                                <span
                                                    class="tf-btn btn-fill animate-hover-btn btn-hide-edit-address">Cancel</span>
                                            </div>
                                        </form>
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
