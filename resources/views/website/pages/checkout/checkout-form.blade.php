@extends('website.layout.app')

@section('title')
Checkout Form
@endsection

@section('content')
 <!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Check Out</div>
            </div>
        </div>
        <!-- /page-title -->

        <!-- page-cart -->
        <section class="flat-spacing-11">
            <div class="container">
                <div class="tf-page-cart-wrap layout-2">
                    <div class="tf-page-cart-item">
                        <h5 class="fw-5 mb_20">Billing details</h5>
                        <form class="form-checkout" id="checkout-form" action="{{ route('new-order') }}" method="POST">
                            @csrf
                            <fieldset class="box fieldset">
                                <label for="full-name">Full Name</label>
                                <input type="text" id="full-name" name="full_name" placeholder="Full Name" value="{{ old('full_name', Auth::guard('customer')->check() ? Auth::guard('customer')->user()->c_full_name : ($userData['full_name'] ?? '')) }}" required>
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="shipping_region">Region</label>
                                <div class="select-custom">
                                    <select class="tf-select w-100" id="shipping_region" name="shipping_region" required>
                                        <option value="">Select Region</option>
                                        @php
                                            $regions = \App\Models\ShippingArea::where('status', 1)->distinct('region')->pluck('region');
                                        @endphp
                                        @foreach($regions as $region)
                                        <option value="{{ $region }}" {{ old('shipping_region', Session::get('selected_shipping_region')) == $region ? 'selected' : '' }}>{{ $region }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="shipping_area">Area</label>
                                <div class="select-custom">
                                    <select class="tf-select w-100" id="shipping_area" name="shipping_area" required>
                                        <option value="">Select Area</option>
                                        @if(Session::has('selected_shipping_region'))
                                            @php
                                                $areas = \App\Models\ShippingArea::where('region', Session::get('selected_shipping_region'))->where('status', 1)->get();
                                            @endphp
                                            @foreach($areas as $area)
                                            <option value="{{ $area->id }}" {{ old('shipping_area', Session::get('selected_shipping_area')) == $area->id ? 'selected' : '' }}>{{ $area->area_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" value="{{ old('address', Auth::guard('customer')->check() ? Auth::guard('customer')->user()->c_address : ($userData['address'] ?? '')) }}" required>
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone', Auth::guard('customer')->check() ? Auth::guard('customer')->user()->c_phone : ($userData['phone'] ?? '')) }}" required>
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', Auth::guard('customer')->check() ? Auth::guard('customer')->user()->c_email : ($userData['email'] ?? '')) }}">
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="note">Order notes (optional)</label>
                                <textarea name="note" id="note">{{ old('note') }}</textarea>
                            </fieldset>
                            <input type="hidden" name="shipping_cost" id="shipping_cost" value="{{ $shippingCost ?? 0 }}">
                            <input type="hidden" name="payment_method" value="cash_on_delivery">
                        </form>
                    </div>
                    <div class="tf-page-cart-footer">
                        <div class="tf-cart-footer-inner">
                            <h5 class="fw-5 mb_20">Your order</h5>
                            <div class="tf-page-cart-checkout widget-wrap-checkout">
                                <ul class="wrap-checkout-product">
                                    @if($cart && $cart->count() > 0)
                                        @foreach($cart as $item)
                                            <li class="checkout-product-item">
                                                <figure class="img-product">
                                                    <img src="{{ asset($item->options->image_path) }}" alt="product">
                                                    <span class="quantity">{{ $item->qty }}</span>
                                                </figure>
                                                <div class="content">
                                                    <div class="info">
                                                        <p class="name">{{ $item->name }}</p>
                                                        @if($item->options->color_name || $item->options->size_name)
                                                            <span class="variant">{{ $item->options->color_name }} / {{ $item->options->size_name }}</span>
                                                        @endif
                                                    </div>
                                                    <span class="price">৳{{ number_format($item->subtotal, 2) }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="checkout-product-item">
                                            <div class="content">
                                                <p class="name">No items in cart</p>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                                <div class="d-flex justify-content-between line pb_20">
                                    <h6 class="fw-5">Subtotal</h6>
                                    <h6 class="fw-5">৳{{ number_format(\Cart::subtotal(), 2) }}</h6>
                                </div>
                                <div class="d-flex justify-content-between line pb_20">
                                    <h6 class="fw-5">Shipping</h6>
                                    <h6 class="fw-5" id="checkout-shipping-cost">৳{{ number_format($shippingCost ?? 0, 2) }}</h6>
                                </div>
                                <div class="d-flex justify-content-between line pb_20">
                                    <h6 class="fw-5">Total</h6>
                                    <h6 class="total fw-5" id="checkout-grand-total">৳{{ number_format(\Cart::subtotal() + ($shippingCost ?? 0), 2) }}</h6>
                                </div>
                                <div class="wd-check-payment">
                                    <div class="fieldset-radio mb_20">
                                        <input type="radio" name="payment_method" value="cash_on_delivery" id="delivery" class="tf-check" checked>
                                        <label for="delivery">Cash on delivery</label>
                                    </div>
                                    <p class="text_black-2 mb_20">Your personal data will be used to process your order,
                                        support your experience throughout this website, and for other purposes
                                        described in our <a href="privacy-policy.html"
                                            class="text-decoration-underline">privacy policy</a>.</p>
                                    <div class="box-checkbox fieldset-radio mb_20">
                                        <input type="checkbox" id="check-agree" name="agree_terms" class="tf-check" required>
                                        <label for="check-agree" class="text_black-2">I have read and agree to the
                                            website <a href="terms-conditions.html"
                                                class="text-decoration-underline">terms and conditions</a>.</label>
                                    </div>
                                </div>
                                <button type="submit" form="checkout-form"
                                    class="tf-btn radius-3 btn-fill btn-icon animate-hover-btn justify-content-center">Place
                                    order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-cart -->
@endsection