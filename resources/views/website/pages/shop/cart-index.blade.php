@extends('website.layout.app')

@section('title')
Cart Page
@endsection

@section('content')
<!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Shopping Cart</div>
            </div>
        </div>
        <!-- /page-title -->

        <!-- page-cart -->
        <section class="flat-spacing-11">
            <div class="container">
                <!-- <div class="tf-page-cart text-center mt_140 mb_200">
                    <h5 class="mb_24">Your cart is empty</h5>
                    <p class="mb_24">You may check out all the available products and buy some in the shop</p>
                    <a href="shop-default.html" class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn">Return to shop<i class="icon icon-arrow1-top-left"></i></a>
                </div> -->
                <div class="tf-cart-countdown">
                    <div class="title-left">
                        <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" width="16" height="24"
                            viewBox="0 0 16 24" fill="rgb(219 18 21)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.0899 24C11.3119 22.1928 11.4245 20.2409 10.4277 18.1443C10.1505 19.2691 9.64344 19.9518 8.90645 20.1924C9.59084 18.2379 9.01896 16.1263 7.19079 13.8576C7.15133 16.2007 6.58824 17.9076 5.50148 18.9782C4.00436 20.4517 4.02197 22.1146 5.55428 23.9669C-0.806588 20.5819 -1.70399 16.0418 2.86196 10.347C3.14516 11.7228 3.83141 12.5674 4.92082 12.8809C3.73335 7.84186 4.98274 3.54821 8.66895 0C8.6916 7.87426 11.1062 8.57414 14.1592 12.089C17.4554 16.3071 15.5184 21.1748 10.0899 24Z">
                            </path>
                        </svg>
                        <p>These products are limited, checkout within </p>
                    </div>
                    <div class="js-countdown timer-count" data-timer="600" data-labels="d:,h:,m:,s"></div>
                </div>
                <div class="tf-page-cart-wrap">
                    <div class="tf-page-cart-item">
                        <form>
                            <table class="tf-table-page-cart">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                    <tr class="tf-cart-item file-delete">
                                        <td class="tf-cart-item_product">
                                            <a href="{{ route('shop.details', $item['product_slug']) }}" class="img-box">
                                                <img src="{{ asset($item['image_path']) }}" alt="img-product">
                                            </a>
                                            <div class="cart-info">
                                                <a href="{{ route('shop.details', $item['product_slug']) }}" class="cart-title link">{{ $item['product_name'] }}</a>
                                                <div class="cart-meta-variant">{{ $item['color_name'] }} / {{ $item['size_name'] }}</div>
                                                <span class="remove-cart link remove" data-row-id="{{ $item['rowId'] }}">Remove</span>
                                            </div>
                                        </td>
                                        <td class="tf-cart-item_price tf-variant-item-price" cart-data-title="Price">
                                            <div class="cart-price price">&#2547;{{ number_format($item['selling_price'], 2) }}</div>
                                        </td>
                                        <td class="tf-cart-item_quantity" cart-data-title="Quantity">
                                            <div class="cart-quantity">
                                                <div class="wg-quantity">
                                                    <span class="btn-quantity btndecrease">
                                                        <svg class="d-inline-block" width="9" height="1"
                                                            viewBox="0 0 9 1" fill="currentColor">
                                                            <path
                                                                d="M9 1H5.14286H3.85714H0V1.50201e-05H3.85714L5.14286 0L9 1.50201e-05V1Z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <input type="text" name="number" value="{{ $item['quantity'] }}" data-row-id="{{ $item['rowId'] }}">
                                                    <span class="btn-quantity btnincrease">
                                                        <svg class="d-inline-block" width="9" height="9"
                                                            viewBox="0 0 9 9" fill="currentColor">
                                                            <path
                                                                d="M9 5.14286H5.14286V9H3.85714V5.14286H0V3.85714H3.85714V0H5.14286V3.85714H9V5.14286Z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="tf-cart-item_total tf-variant-item-total" cart-data-title="Total">
                                            <div class="cart-total price">&#2547;{{ number_format($item['subtotal'], 2) }}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="tf-page-cart-note">
                                <label for="cart-note">Add Order Note</label>
                                <textarea name="note" id="cart-note" placeholder="How can we help you?"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="tf-page-cart-footer">
                        <div class="tf-cart-footer-inner">
                            <div class="tf-page-cart-checkout">
                                <div class="shipping-calculator">
                                    <summary
                                        class="accordion-shipping-header d-flex justify-content-between align-items-center collapsed"
                                        data-bs-target="#shipping" data-bs-toggle="collapse" aria-controls="shipping">
                                        <h3 class="shipping-calculator-title">Select Shipping Area</h3>
                                        <span class="shipping-calculator_accordion-icon"></span>
                                    </summary>
                                    <div class="collapse" id="shipping">
                                        <div class="accordion-shipping-content">
                                            <fieldset class="field">
                                                <label class="label">Region</label>
                                                <select class="tf-select w-100" id="shipping-region" name="region" required>
                                                    <option value="">Select Region</option>
                                                    @foreach($regions as $region)
                                                    <option value="{{ $region }}" {{ isset($selectedRegion) && $selectedRegion == $region ? 'selected' : '' }}>{{ $region }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                            <fieldset class="field">
                                                <label class="label">Area Name</label>
                                                <select class="tf-select w-100" id="shipping-area" name="area" required>
                                                    <option value="">Select Area</option>
                                                    @if(isset($selectedRegion) && isset($selectedArea))
                                                        @php
                                                            $areas = \App\Models\ShippingArea::where('region', $selectedRegion)->where('status', 1)->get();
                                                        @endphp
                                                        @foreach($areas as $area)
                                                        <option value="{{ $area->id }}" {{ $selectedArea == $area->id ? 'selected' : '' }}>{{ $area->area_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-cart-totals-discounts">
                                    <h3>Subtotal</h3>
                                    <span class="total-value" id="subtotal-display">&#2547;{{ number_format((float)\Cart::subtotal(), 2) }} TK</span>
                                </div>
                                <div class="tf-cart-totals-discounts">
                                    <h3>Shipping</h3>
                                    <span class="total-value" id="shipping-cost-display">&#2547;0.00 TK</span>
                                </div>
                                <div class="tf-cart-totals-discounts">
                                    <h3>Total</h3>
                                    <span class="total-value" id="grand-total">&#2547;{{ number_format((float)\Cart::subtotal(), 2) }} TK</span>
                                    <input type="hidden" id="subtotal" value="{{ (float)\Cart::subtotal() }}">
                                </div>
                                <p class="tf-cart-tax">
                                    <a href="#">Shipping Charge</a> calculated automatically By Region and Shipping Area.
                                </p>
                                <div class="cart-checkbox">
                                    <input type="checkbox" class="tf-check" id="check-agree">
                                    <label for="check-agree" class="fw-4">
                                        I agree with the <a href="terms-conditions.html">terms and conditions</a>
                                    </label>
                                </div>
                                <div class="cart-checkout-btn">
                                    <button type="button" id="checkout-btn"
                                        class="tf-btn w-100 btn-fill animate-hover-btn radius-3 justify-content-center">
                                        <span>Check out</span>
                                    </button>
                                </div>
                                <div class="tf-page-cart_imgtrust">
                                    <p class="text-center fw-6">Guarantee Safe Checkout</p>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-cart -->
@endsection