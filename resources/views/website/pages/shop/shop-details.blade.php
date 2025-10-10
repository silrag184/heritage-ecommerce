@extends('website.layout.app')

@section('title')
{{ $product->product_name ?? 'Shop Details' }}
@endsection

@section('content')
<!-- breadcrumb -->
        <div class="tf-breadcrumb">
            <div class="container">
                <div class="tf-breadcrumb-wrap d-flex justify-content-between flex-wrap align-items-center">
                    <div class="tf-breadcrumb-list">
                        <a href="{{ route('home') }}" class="text">Home</a>
                        <i class="icon icon-arrow-right"></i>
                        <a href="{{ route('shop.section') }}" class="text">Shop</a>
                        <i class="icon icon-arrow-right"></i>
                        <span class="text">{{ $product->product_name }}</span>
                    </div>
                    <div class="tf-breadcrumb-prev-next">
                        <a href="#" class="tf-breadcrumb-prev hover-tooltip center">
                            <i class="icon icon-arrow-left"></i>
                        </a>
                        <a href="#" class="tf-breadcrumb-back hover-tooltip center">
                            <i class="icon icon-shop"></i>
                        </a>
                        <a href="#" class="tf-breadcrumb-next hover-tooltip center">
                            <i class="icon icon-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /breadcrumb -->
        <!-- default -->
        <section class="flat-spacing-4 pt_0">
            <div class="tf-main-product">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tf-product-media-wrap sticky-top">
                                <div class="thumbs-slider">
                                    <div dir="ltr" class="swiper tf-product-media-thumbs" data-direction="vertical">
                                        <div class="swiper-wrapper stagger-wrap">
                                            @foreach($product->colorImages as $colorImage)
                                                <div class="swiper-slide stagger-item" data-color="{{ strtolower($colorImage->color_code) }}">
                                                    <div class="item">
                                                        <img class="lazyload" data-src="{{ asset($colorImage->image_path) }}"
                                                            src="{{ asset($colorImage->image_path) }}" alt="img-product">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div dir="ltr" class="swiper tf-product-media-main tf-product-zoom-inner"
                                        id="gallery-swiper-started">
                                        <div class="swiper-wrapper">
                                            @foreach($product->colorImages as $colorImage)
                                                <div class="swiper-slide" data-color="{{($colorImage->color_code) }}">
                                                    <a href="{{ asset($colorImage->image_path) }}" target="_blank" class="item"
                                                        data-pswp-width="770px" data-pswp-height="1075px">
                                                        <img class="tf-image-zoom-inner lazyload"
                                                            data-zoom="{{ asset($colorImage->image_path) }}"
                                                            data-src="{{ asset($colorImage->image_path) }}"
                                                            src="{{ asset($colorImage->image_path) }}" alt="img-product">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next button-style-arrow thumbs-next"></div>
                                        <div class="swiper-button-prev button-style-arrow thumbs-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tf-product-info-wrap position-relative">
                                <div class="tf-zoom-main"></div>
                                <div class="tf-product-info-list">
                                    <div class="tf-product-info-title">
                                        <h5>{{ $product->product_name }}</h5>
                                    </div>
                                    <div class="tf-product-info-badges">
                                        @foreach($product->tags as $tag)
                                            <div class="badges">{{ $tag->tag_name }}</div>
                                         @endforeach
                                        {{-- @foreach($product->tags as $tag)
                                                <span class="badge bg-secondary me-1">{{ $tag->tag_name }}</span>
                                            @endforeach --}}
                                        <div class="product-status-content">
                                            <i class="icon-lightning"></i>
                                            {{-- <p class="fw-6">Selling fast! 56 people have this in their carts.</p> --}}
                                            <p class="fw-6">Selling fast!!</p>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-price">
                                        <div class="price-on-sale">&#2547;{{ $product->selling_price }}</div>
                                        <div class="compare-at-price">&#2547;{{ $product->regular_price }}</div>
                                        <div class="badges-on-sale"><span>{{ $product->regular_price > 0 ? round((($product->regular_price - $product->selling_price) / $product->regular_price) * 100) : 0 }}</span>% OFF</div>
                                    </div>
                                    {{-- <div class="tf-product-info-liveview">
                                        <div class="liveview-count">20</div>
                                        <p class="fw-6">People are viewing this right now</p>
                                    </div> --}}
                                    {{-- <div class="tf-product-info-countdown">
                                        <div class="countdown-wrap">
                                            <div class="countdown-title">
                                                <i class="icon-time tf-ani-tada"></i>
                                                <p>HURRY UP! SALE ENDS IN:</p>
                                            </div>
                                            <div class="tf-countdown style-1">
                                                <div class="js-countdown" data-timer="1007500"
                                                    data-labels="Days :,Hours :,Mins :,Secs"></div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="tf-product-info-variant-picker">
                                        {{-- <div class="variant-picker-item">
                                            <div class="variant-picker-label">
                                                Color: <span
                                                    class="fw-6 variant-picker-label-value value-currentColor">{{ $product->colorImages->first()->color_code ?? 'Brown' }}</span>
                                            </div>
                                            <div class="variant-picker-values">
                                                @foreach($product->colorImages as $index => $colorImage)
                                                    <input id="color-{{ $colorImage->id }}" type="radio" name="color1" {{ $index === 0 ? 'checked' : '' }}>
                                                    <label class="hover-tooltip radius-60 color-btn" data-color="{{ ($colorImage->color_code) }}"
                                                        for="color-{{ $colorImage->id }}" data-value="{{ $colorImage->color_code }}">
                                                        <span class="btn-checkbox {{ ($colorImage->color_code) }}" style="background-color: {{ ($colorImage->color_code) }}"></span>
                                                        <span class="tooltip">{{ $colorImage->color_code }}</span>
                                                    </label>
                                                @endforeach

                                            </div>
                                        </div> --}}
                                        @php
                                            $firstColor = $product->colorImages->first();
                                            $colorCode = $firstColor?->color_code ?? '#A52A2A';
                                            $colorName = getColorName($colorCode);
                                        @endphp
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-label">
                                                Color:
                                                {{-- <span class="fw-6 variant-picker-label-value value-currentColor">
                                                    {{ getColorName($product->colorImages->first()->color_code ?? '#A52A2A') }}
                                                </span> --}}
                                                <span class="fw-6 variant-picker-label-value value-currentColor">
                                                    {{-- {{ getColorName($product->colorImages->first()->color_code ?? '#A52A2A') }} --}}
                                                    {{ $colorName }}
                                                </span>

                                            </div>

                                            <div class="variant-picker-values">
                                                @foreach($product->colorImages as $index => $colorImage)
                                                    @php
                                                        $colorCode = $colorImage->color_code;
                                                        $colorName = getColorName($colorCode);
                                                    @endphp
                                                    <input id="color-{{ $colorImage->id }}" type="radio" name="color1" {{ $index === 0 ? 'checked' : '' }} value="{{ $colorImage->id }}" data-color-name="{{ $colorName }}">
                                                    <label class="hover-tooltip radius-60 color-btn"
                                                        data-color="{{ $colorCode }}"
                                                        for="color-{{ $colorImage->id }}"
                                                        data-value="{{ $colorName }}">
                                                        <span class="btn-checkbox" style="background-color: {{ $colorCode }}"></span>
                                                        <span class="tooltip">{{ $colorName }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="variant-picker-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="variant-picker-label">
                                                    Size: <span class="fw-6 variant-picker-label-value size-current">{{ $product->sizes->first()->size_name ?? 'S' }}</span>
                                                </div>
                                                <a href="#find_size" data-bs-toggle="modal" class="find-size fw-6">Find
                                                    your size</a>
                                            </div>
                                            <div class="variant-picker-values">
                                                @foreach($product->sizes as $index => $size)
                                                    <input type="radio" name="size1" id="size-{{ $size->id }}" {{ $index === 0 ? 'checked' : '' }} value="{{ $size->id }}">
                                                    <label class="style-text size-btn" for="size-{{ $size->id }}" data-value="{{ $size->size_name }}">
                                                        <p>{{ $size->size_name }}</p>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-quantity">
                                        <div class="quantity-title fw-6">Quantity</div>
                                        <div class="wg-quantity">
                                            <span class="btn-quantity btn-decrease">-</span>
                                            <input type="text" class="quantity-product" name="number" value="1">
                                            <span class="btn-quantity btn-increase">+</span>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-buy-button">
                                        <form class="" onsubmit="return false;">
                                            <a href="javascript:void(0);"
                                                class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart"><span>Add
                                                    to cart -&nbsp;</span><span
                                                    class="tf-qty-price total-price">&#2547;{{ $product->selling_price }}</span></a>
                                            <a href="javascript:void(0);"
                                                class="tf-product-btn-wishlist hover-tooltip box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="tf-product-btn-wishlist hover-tooltip box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            {{-- <div class="w-100">
                                                <a href="#" class="btns-full">Buy with <img
                                                        src="{{asset('/')}}website/assets/images/payments/paypal.png" alt=""></a>
                                                <a href="#" class="payment-more-option">More payment options</a>
                                            </div> --}}
                                        </form>
                                    </div>
                                    <div class="tf-product-info-extra-link">
                                        <a href="#ask_question" data-bs-toggle="modal" class="tf-product-extra-icon">
                                            <div class="icon">
                                                <i class="icon-question"></i>
                                            </div>
                                            <div class="text fw-6">Ask a question</div>
                                        </a>
                                        <a href="#delivery_return" data-bs-toggle="modal" class="tf-product-extra-icon">
                                            <div class="icon">
                                                <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg"
                                                    width="22" height="18" viewBox="0 0 22 18" fill="currentColor">
                                                    <path
                                                        d="M21.7872 10.4724C21.7872 9.73685 21.5432 9.00864 21.1002 8.4217L18.7221 5.27043C18.2421 4.63481 17.4804 4.25532 16.684 4.25532H14.9787V2.54885C14.9787 1.14111 13.8334 0 12.4255 0H9.95745V1.69779H12.4255C12.8948 1.69779 13.2766 2.07962 13.2766 2.54885V14.5957H8.15145C7.80021 13.6052 6.85421 12.8936 5.74468 12.8936C4.63515 12.8936 3.68915 13.6052 3.33792 14.5957H2.55319C2.08396 14.5957 1.70213 14.2139 1.70213 13.7447V2.54885C1.70213 2.07962 2.08396 1.69779 2.55319 1.69779H9.95745V0H2.55319C1.14528 0 0 1.14111 0 2.54885V13.7447C0 15.1526 1.14528 16.2979 2.55319 16.2979H3.33792C3.68915 17.2884 4.63515 18 5.74468 18C6.85421 18 7.80021 17.2884 8.15145 16.2979H13.423C13.7742 17.2884 14.7202 18 15.8297 18C16.9393 18 17.8853 17.2884 18.2365 16.2979H21.7872V10.4724ZM16.684 5.95745C16.9494 5.95745 17.2034 6.08396 17.3634 6.29574L19.5166 9.14894H14.9787V5.95745H16.684ZM5.74468 16.2979C5.27545 16.2979 4.89362 15.916 4.89362 15.4468C4.89362 14.9776 5.27545 14.5957 5.74468 14.5957C6.21392 14.5957 6.59575 14.9776 6.59575 15.4468C6.59575 15.916 6.21392 16.2979 5.74468 16.2979ZM15.8298 16.2979C15.3606 16.2979 14.9787 15.916 14.9787 15.4468C14.9787 14.9776 15.3606 14.5957 15.8298 14.5957C16.299 14.5957 16.6809 14.9776 16.6809 15.4468C16.6809 15.916 16.299 16.2979 15.8298 16.2979ZM18.2366 14.5957C17.8853 13.6052 16.9393 12.8936 15.8298 12.8936C15.5398 12.8935 15.252 12.943 14.9787 13.04V10.8511H20.0851V14.5957H18.2366Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="text fw-6">Delivery & Return</div>
                                        </a>
                                    </div>
                                    <div class="tf-product-info-delivery-return">
                                        <div class="row">
                                            <div class="col-xl-6 col-12">
                                                <div class="tf-product-delivery">
                                                    <div class="icon">
                                                        <i class="icon-delivery-time"></i>
                                                    </div>
                                                    <p>Estimate delivery times: <span class="fw-7">2-3 days</span>
                                                        (Inside Dhaka), <span class="fw-7">3-6 days</span> (Outside Dhaka).</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-12">
                                                <div class="tf-product-delivery mb-0">
                                                    <div class="icon">
                                                        <i class="icon-return-order"></i>
                                                    </div>
                                                    <p>Return within <span class="fw-7">30 days</span> of purchase.
                                                        Duties & taxes are non-refundable.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-trust-seal">
                                        <div class="tf-product-trust-mess">
                                            <i class="icon-safe"></i>
                                            <p class="fw-6">Guarantee Safe <br> Checkout</p>
                                        </div>
                                        {{-- <div class="tf-payment">
                                            <img src="{{asset('/')}}website/assets/images/payments/visa.png" alt="">
                                            <img src="{{asset('/')}}website/assets/images/payments/img-1.png" alt="">
                                            <img src="{{asset('/')}}website/assets/images/payments/img-2.png" alt="">
                                            <img src="{{asset('/')}}website/assets/images/payments/img-3.png" alt="">
                                            <img src="{{asset('/')}}website/assets/images/payments/img-4.png" alt="">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /default -->
        <!-- tabs -->
        <section class="flat-spacing-17 pt_0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-tabs style-has-border">
                            <ul class="widget-menu-tab">
                                <li class="item-title active">
                                    <span class="inner">Description</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Additional Information</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Review</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Shipping</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Return Policies</span>
                                </li>
                            </ul>
                            <div class="widget-content-tab">
                                <div class="widget-content-inner active">
                                    <div class="">
                                        {!! $product->long_description !!}
                                    </div>
                                </div>
                                <div class="widget-content-inner">
                                    <table class="tf-pr-attrs">
                                        <tbody>
                                            <tr class="tf-attr-pa-color">
                                                <th class="tf-attr-label">Color</th>
                                                <td class="tf-attr-value">
                                                    <p>White, Pink, Black</p>
                                                </td>
                                            </tr>
                                            <tr class="tf-attr-pa-size">
                                                <th class="tf-attr-label">Size</th>
                                                <td class="tf-attr-value">
                                                    <p>S, M, L, XL</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="widget-content-inner">
                                    <div class="tab-reviews write-cancel-review-wrap">
                                        <div class="tab-reviews-heading">
                                            <div class="top">
                                                <div class="text-center">
                                                    <h1 class="number fw-6">4.8</h1>
                                                    <div class="list-star">
                                                        <i class="icon icon-star"></i>
                                                        <i class="icon icon-star"></i>
                                                        <i class="icon icon-star"></i>
                                                        <i class="icon icon-star"></i>
                                                        <i class="icon icon-star"></i>
                                                    </div>
                                                    <p>(168 Ratings)</p>
                                                </div>
                                                <div class="rating-score">
                                                    <div class="item">
                                                        <div class="number-1 text-caption-1">5</div>
                                                        <i class="icon icon-star"></i>
                                                        <div class="line-bg">
                                                            <div style="width: 94.67%;"></div>
                                                        </div>
                                                        <div class="number-2 text-caption-1">59</div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="number-1 text-caption-1">4</div>
                                                        <i class="icon icon-star"></i>
                                                        <div class="line-bg">
                                                            <div style="width: 60%;"></div>
                                                        </div>
                                                        <div class="number-2 text-caption-1">46</div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="number-1 text-caption-1">3</div>
                                                        <i class="icon icon-star"></i>
                                                        <div class="line-bg">
                                                            <div style="width: 0%;"></div>
                                                        </div>
                                                        <div class="number-2 text-caption-1">0</div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="number-1 text-caption-1">2</div>
                                                        <i class="icon icon-star"></i>
                                                        <div class="line-bg">
                                                            <div style="width: 0%;"></div>
                                                        </div>
                                                        <div class="number-2 text-caption-1">0</div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="number-1 text-caption-1">1</div>
                                                        <i class="icon icon-star"></i>
                                                        <div class="line-bg">
                                                            <div style="width: 0%;"></div>
                                                        </div>
                                                        <div class="number-2 text-caption-1">0</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div
                                                    class="tf-btn btn-outline-dark fw-6 btn-comment-review btn-cancel-review">
                                                    Cancel Review</div>
                                                <div
                                                    class="tf-btn btn-outline-dark fw-6 btn-comment-review btn-write-review">
                                                    Write a review</div>
                                            </div>
                                        </div>
                                        <div class="reply-comment cancel-review-wrap">
                                            <div
                                                class="d-flex mb_24 gap-20 align-items-center justify-content-between flex-wrap">
                                                <h5 class="">03 Comments</h5>
                                                <div class="d-flex align-items-center gap-12">
                                                    <div class="text-caption-1">Sort by:</div>
                                                    <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                                                        <div class="btn-select">
                                                            <span class="text-sort-value">Most Recent</span>
                                                            <span class="icon icon-arrow-down"></span>
                                                        </div>
                                                        <div class="dropdown-menu">
                                                            <div class="select-item active">
                                                                <span class="text-value-item">Most Recent</span>
                                                            </div>
                                                            <div class="select-item">
                                                                <span class="text-value-item">Oldest</span>
                                                            </div>
                                                            <div class="select-item">
                                                                <span class="text-value-item">Most Popular</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reply-comment-wrap">
                                                <div class="reply-comment-item">
                                                    <div class="user">
                                                        <div class="image">
                                                            <img src="{{asset('/')}}website/assets/images/collections/collection-circle-9.jpg"
                                                                alt="">
                                                        </div>
                                                        <div>
                                                            <h6>
                                                                <a href="#" class="link">Superb quality apparel that
                                                                    exceeds expectations</a>
                                                            </h6>
                                                            <div class="day text_black-2">1 days ago</div>
                                                        </div>
                                                    </div>
                                                    <p class="text_black-2">Great theme - we were looking for a theme
                                                        with lots of built in features and flexibility and this was
                                                        perfect. We expected to need to employ a developer to add a few
                                                        finishing touches. But we actually managed to do everything
                                                        ourselves. We did have one small query and the support given was
                                                        swift and helpful.</p>
                                                </div>
                                                <div class="reply-comment-item type-reply">
                                                    <div class="user">
                                                        <div class="image">
                                                            <img src="{{asset('/')}}website/assets/images/collections/collection-circle-10.jpg"
                                                                alt="">
                                                        </div>
                                                        <div>
                                                            <h6>
                                                                <a href="#" class="link">Reply from Modave</a>
                                                            </h6>
                                                            <div class="day text_black-2">1 days ago</div>
                                                        </div>
                                                    </div>
                                                    <p class="text_black-2">We love to hear it! Part of what we love
                                                        most about Modave is how much it empowers store owners like
                                                        yourself to build a beautiful website without having to hire a
                                                        developer :) Thank you for this fantastic review!</p>
                                                </div>
                                                <div class="reply-comment-item">
                                                    <div class="user">
                                                        <div class="image">
                                                            <img src="{{asset('/')}}website/assets/images/collections/collection-circle-9.jpg"
                                                                alt="">
                                                        </div>
                                                        <div>
                                                            <h6>
                                                                <a href="#" class="link">Superb quality apparel that
                                                                    exceeds expectations</a>
                                                            </h6>
                                                            <div class="day text_black-2">1 days ago </div>
                                                        </div>
                                                    </div>
                                                    <p class="text_black-2">Great theme - we were looking for a theme
                                                        with lots of built in features and flexibility and this was
                                                        perfect. We expected to need to employ a developer to add a few
                                                        finishing touches. But we actually managed to do everything
                                                        ourselves. We did have one small query and the support given was
                                                        swift and helpful.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="form-write-review write-review-wrap">
                                            <div class="heading">
                                                <h5>Write a review:</h5>
                                                <div class="list-rating-check">
                                                    <input type="radio" id="star5" name="rate" value="5" />
                                                    <label for="star5" title="text"></label>
                                                    <input type="radio" id="star4" name="rate" value="4" />
                                                    <label for="star4" title="text"></label>
                                                    <input type="radio" id="star3" name="rate" value="3" />
                                                    <label for="star3" title="text"></label>
                                                    <input type="radio" id="star2" name="rate" value="2" />
                                                    <label for="star2" title="text"></label>
                                                    <input type="radio" id="star1" name="rate" value="1" />
                                                    <label for="star1" title="text"></label>
                                                </div>
                                            </div>
                                            <div class="form-content">
                                                <fieldset class="box-field">
                                                    <label class="label">Review Title</label>
                                                    <input type="text" placeholder="Give your review a title"
                                                        name="text" tabindex="2" value="" aria-required="true"
                                                        required="">
                                                </fieldset>
                                                <fieldset class="box-field">
                                                    <label class="label">Review</label>
                                                    <textarea rows="4" placeholder="Write your comment here"
                                                        tabindex="2" aria-required="true" required=""></textarea>
                                                </fieldset>
                                                <div class="box-field group-2">
                                                    <fieldset>
                                                        <input type="text" placeholder="You Name (Public)" name="text"
                                                            tabindex="2" value="" aria-required="true" required="">
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="email" placeholder="Your email (private)"
                                                            name="email" tabindex="2" value="" aria-required="true"
                                                            required="">
                                                    </fieldset>
                                                </div>
                                                <div class="box-check">
                                                    <input type="checkbox" name="availability" class="tf-check"
                                                        id="check1">
                                                    <label class="text_black-2" for="check1">Save my name, email, and
                                                        website in this browser for the next time I comment.</label>
                                                </div>
                                            </div>
                                            <div class="button-submit">
                                                <button class="tf-btn btn-fill animate-hover-btn" type="submit">Submit
                                                    Reviews</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="widget-content-inner">
                                    <div class="tf-page-privacy-policy">
                                        <div class="title">The Company Private Limited Policy</div>
                                        <p>The Company Private Limited and each of their respective subsidiary, parent
                                            and affiliated companies is deemed to operate this Website (“we” or “us”)
                                            recognizes that you care how information about you is used and shared. We
                                            have created this Privacy Policy to inform you what information we collect
                                            on the Website, how we use your information and the choices you have about
                                            the way your information is collected and used. Please read this Privacy
                                            Policy carefully. Your use of the Website indicates that you have read and
                                            accepted our privacy practices, as outlined in this Privacy Policy.</p>
                                        <p>Please be advised that the practices described in this Privacy Policy apply
                                            to information gathered by us or our subsidiaries, affiliates or agents: (i)
                                            through this Website, (ii) where applicable, through our Customer Service
                                            Department in connection with this Website, (iii) through information
                                            provided to us in our free standing retail stores, and (iv) through
                                            information provided to us in conjunction with marketing promotions and
                                            sweepstakes.</p>
                                        <p>We are not responsible for the content or privacy practices on any websites.
                                        </p>
                                        <p>We reserve the right, in our sole discretion, to modify, update, add to,
                                            discontinue, remove or otherwise change any portion of this Privacy Policy,
                                            in whole or in part, at any time. When we amend this Privacy Policy, we will
                                            revise the “last updated” date located at the top of this Privacy Policy.
                                        </p>
                                        <p>If you provide information to us or access or use the Website in any way
                                            after this Privacy Policy has been changed, you will be deemed to have
                                            unconditionally consented and agreed to such changes. The most current
                                            version of this Privacy Policy will be available on the Website and will
                                            supersede all previous versions of this Privacy Policy.</p>
                                        <p>If you have any questions regarding this Privacy Policy, you should contact
                                            our Customer Service Department by email at marketing@company.com</p>
                                    </div>
                                </div>
                                <div class="widget-content-inner">
                                    <ul class="d-flex justify-content-center mb_18">
                                        <li class="">
                                            <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                                margin="5px">
                                                <path fill="currentColor"
                                                    d="M8.7 30.7h22.7c.3 0 .6-.2.7-.6l4-25.3c-.1-.4-.3-.7-.7-.8s-.7.2-.8.6L34 8.9l-3-1.1c-2.4-.9-5.1-.5-7.2 1-2.3 1.6-5.3 1.6-7.6 0-2.1-1.5-4.8-1.9-7.2-1L6 8.9l-.7-4.3c0-.4-.4-.7-.7-.6-.4.1-.6.4-.6.8l4 25.3c.1.3.3.6.7.6zm.8-21.6c2-.7 4.2-.4 6 .8 1.4 1 3 1.5 4.6 1.5s3.2-.5 4.6-1.5c1.7-1.2 4-1.6 6-.8l3.3 1.2-3 19.1H9.2l-3-19.1 3.3-1.2zM32 32H8c-.4 0-.7.3-.7.7s.3.7.7.7h24c.4 0 .7-.3.7-.7s-.3-.7-.7-.7zm0 2.7H8c-.4 0-.7.3-.7.7s.3.6.7.6h24c.4 0 .7-.3.7-.7s-.3-.6-.7-.6zm-17.9-8.9c-1 0-1.8-.3-2.4-.6l.1-2.1c.6.4 1.4.6 2 .6.8 0 1.2-.4 1.2-1.3s-.4-1.3-1.3-1.3h-1.3l.2-1.9h1.1c.6 0 1-.3 1-1.3 0-.8-.4-1.2-1.1-1.2s-1.2.2-1.9.4l-.2-1.9c.7-.4 1.5-.6 2.3-.6 2 0 3 1.3 3 2.9 0 1.2-.4 1.9-1.1 2.3 1 .4 1.3 1.4 1.3 2.5.3 1.8-.6 3.5-2.9 3.5zm4-5.5c0-3.9 1.2-5.5 3.2-5.5s3.2 1.6 3.2 5.5-1.2 5.5-3.2 5.5-3.2-1.6-3.2-5.5zm4.1 0c0-2-.1-3.5-.9-3.5s-1 1.5-1 3.5.1 3.5 1 3.5c.8 0 .9-1.5.9-3.5zm4.5-1.4c-.9 0-1.5-.8-1.5-2.1s.6-2.1 1.5-2.1 1.5.8 1.5 2.1-.5 2.1-1.5 2.1zm0-.8c.4 0 .7-.5.7-1.2s-.2-1.2-.7-1.2-.7.5-.7 1.2.3 1.2.7 1.2z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li class="">
                                            <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                                margin="5px">
                                                <path fill="currentColor"
                                                    d="M36.7 31.1l-2.8-1.3-4.7-9.1 7.5-3.5c.4-.2.6-.6.4-1s-.6-.5-1-.4l-7.5 3.5-7.8-15c-.3-.5-1.1-.5-1.4 0l-7.8 15L4 15.9c-.4-.2-.8 0-1 .4s0 .8.4 1l7.5 3.5-4.7 9.1-2.8 1.3c-.4.2-.6.6-.4 1 .1.3.4.4.7.4.1 0 .2 0 .3-.1l1-.4-1.5 2.8c-.1.2-.1.5 0 .8.1.2.4.3.7.3h31.7c.3 0 .5-.1.7-.4.1-.2.1-.5 0-.8L35.1 32l1 .4c.1 0 .2.1.3.1.3 0 .6-.2.7-.4.1-.3 0-.8-.4-1zm-5.1-2.3l-9.8-4.6 6-2.8 3.8 7.4zM20 6.4L27.1 20 20 23.3 12.9 20 20 6.4zm-7.8 15l6 2.8-9.8 4.6 3.8-7.4zm22.4 13.1H5.4L7.2 31 20 25l12.8 6 1.8 3.5z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li class="">
                                            <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                                margin="5px">
                                                <path fill="currentColor"
                                                    d="M5.9 5.9v28.2h28.2V5.9H5.9zM19.1 20l-8.3 8.3c-2-2.2-3.2-5.1-3.2-8.3s1.2-6.1 3.2-8.3l8.3 8.3zm-7.4-9.3c2.2-2 5.1-3.2 8.3-3.2s6.1 1.2 8.3 3.2L20 19.1l-8.3-8.4zM20 20.9l8.3 8.3c-2.2 2-5.1 3.2-8.3 3.2s-6.1-1.2-8.3-3.2l8.3-8.3zm.9-.9l8.3-8.3c2 2.2 3.2 5.1 3.2 8.3s-1.2 6.1-3.2 8.3L20.9 20zm8.4-10.2c-1.2-1.1-2.6-2-4.1-2.6h6.6l-2.5 2.6zm-18.6 0L8.2 7.2h6.6c-1.5.6-2.9 1.5-4.1 2.6zm-.9.9c-1.1 1.2-2 2.6-2.6 4.1V8.2l2.6 2.5zM7.2 25.2c.6 1.5 1.5 2.9 2.6 4.1l-2.6 2.6v-6.7zm3.5 5c1.2 1.1 2.6 2 4.1 2.6H8.2l2.5-2.6zm18.6 0l2.6 2.6h-6.6c1.4-.6 2.8-1.5 4-2.6zm.9-.9c1.1-1.2 2-2.6 2.6-4.1v6.6l-2.6-2.5zm2.6-14.5c-.6-1.5-1.5-2.9-2.6-4.1l2.6-2.6v6.7z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li class="">
                                            <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                                margin="5px">
                                                <path fill="currentColor"
                                                    d="M35.1 33.6L33.2 6.2c0-.4-.3-.7-.7-.7H13.9c-.4 0-.7.3-.7.7s.3.7.7.7h18l.7 10.5H20.8c-8.8.2-15.9 7.5-15.9 16.4 0 .4.3.7.7.7h28.9c.2 0 .4-.1.5-.2s.2-.3.2-.5v-.2h-.1zm-28.8-.5C6.7 25.3 13 19 20.8 18.9h11.9l1 14.2H6.3zm11.2-6.8c0 1.2-1 2.1-2.1 2.1s-2.1-1-2.1-2.1 1-2.1 2.1-2.1 2.1 1 2.1 2.1zm6.3 0c0 1.2-1 2.1-2.1 2.1-1.2 0-2.1-1-2.1-2.1s1-2.1 2.1-2.1 2.1 1 2.1 2.1z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li class="">
                                            <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                                margin="5px">
                                                <path fill="currentColor"
                                                    d="M20 33.8c7.6 0 13.8-6.2 13.8-13.8S27.6 6.2 20 6.2 6.2 12.4 6.2 20 12.4 33.8 20 33.8zm0-26.3c6.9 0 12.5 5.6 12.5 12.5S26.9 32.5 20 32.5 7.5 26.9 7.5 20 13.1 7.5 20 7.5zm-.4 15h.5c1.8 0 3-1.1 3-3.7 0-2.2-1.1-3.6-3.1-3.6h-2.6v10.6h2.2v-3.3zm0-5.2h.4c.6 0 .9.5.9 1.7 0 1.1-.3 1.7-.9 1.7h-.4v-3.4z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li class="">
                                            <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                                margin="5px">
                                                <path fill="currentColor"
                                                    d="M30.2 29.3c2.2-2.5 3.6-5.7 3.6-9.3s-1.4-6.8-3.6-9.3l3.6-3.6c.3-.3.3-.7 0-.9-.3-.3-.7-.3-.9 0l-3.6 3.6c-2.5-2.2-5.7-3.6-9.3-3.6s-6.8 1.4-9.3 3.6L7.1 6.2c-.3-.3-.7-.3-.9 0-.3.3-.3.7 0 .9l3.6 3.6c-2.2 2.5-3.6 5.7-3.6 9.3s1.4 6.8 3.6 9.3l-3.6 3.6c-.3.3-.3.7 0 .9.1.1.3.2.5.2s.3-.1.5-.2l3.6-3.6c2.5 2.2 5.7 3.6 9.3 3.6s6.8-1.4 9.3-3.6l3.6 3.6c.1.1.3.2.5.2s.3-.1.5-.2c.3-.3.3-.7 0-.9l-3.8-3.6z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li class="">
                                            <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222"
                                                margin="5px">
                                                <path fill="currentColor"
                                                    d="M34.1 34.1H5.9V5.9h28.2v28.2zM7.2 32.8h25.6V7.2H7.2v25.6zm13.5-18.3a.68.68 0 0 0-.7-.7.68.68 0 0 0-.7.7v10.9a.68.68 0 0 0 .7.7.68.68 0 0 0 .7-.7V14.5z">
                                                </path>
                                            </svg>
                                        </li>
                                    </ul>
                                    <p class="text-center text-paragraph">LT01: 70% wool, 15% polyester, 10% polyamide,
                                        5% acrylic 900 Grms/mt</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /tabs -->


        <!-- modal ask_question -->
        <div class="modal modalCentered fade modalDemo tf-product-modal modal-part-content" id="ask_question">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="header">
                        <div class="demo-title">Ask a question</div>
                        <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                    </div>
                    <div class="overflow-y-auto">
                        <form class="">
                            <fieldset class="">
                                <label for="">Name *</label>
                                <input type="text" placeholder="" class="" name="text" tabindex="2" value=""
                                    aria-required="true" required="">
                            </fieldset>
                            <fieldset class="">
                                <label for="">Email *</label>
                                <input type="email" placeholder="" class="" name="text" tabindex="2" value=""
                                    aria-required="true" required="">
                            </fieldset>
                            <fieldset class="">
                                <label for="">Phone number</label>
                                <input type="number" placeholder="" class="" name="text" tabindex="2" value=""
                                    aria-required="true" required="">
                            </fieldset>
                            <fieldset class="">
                                <label for="">Message</label>
                                <textarea name="message" rows="4" placeholder="" class="" tabindex="2" aria-required="true"
                                    required=""></textarea>
                            </fieldset>
                            <button type="submit"
                                class="tf-btn w-100 btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn"><span>Send</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /modal ask_question -->

        <!-- modal delivery_return -->
        <div class="modal modalCentered fade modalDemo tf-product-modal modal-part-content" id="delivery_return">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="header">
                        <div class="demo-title">Shipping & Delivery</div>
                        <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                    </div>
                    <div class="overflow-y-auto">
                        <div class="tf-product-popup-delivery">
                            <div class="title">Delivery</div>
                            <p class="text-paragraph">All orders shipped with UPS Express.</p>
                            <p class="text-paragraph">Always free shipping for orders over US $250.</p>
                            <p class="text-paragraph">All orders are shipped with a UPS tracking number.</p>
                        </div>
                        <div class="tf-product-popup-delivery">
                            <div class="title">Returns</div>
                            <p class="text-paragraph">Items returned within 14 days of their original shipment date in same
                                as new condition will be eligible for a full refund or store credit.</p>
                            <p class="text-paragraph">Refunds will be charged back to the original form of payment used for
                                purchase.</p>
                            <p class="text-paragraph">Customer is responsible for shipping charges when making returns and
                                shipping/handling fees of original purchase is non-refundable.</p>
                            <p class="text-paragraph">All sale items are final purchases.</p>
                        </div>
                        <div class="tf-product-popup-delivery">
                            <div class="title">Help</div>
                            <p class="text-paragraph">Give us a shout if you have any other questions and/or concerns.</p>
                            <p class="text-paragraph">Email: <a href="mailto:contact@domain.com"
                                    aria-describedby="a11y-external-message"><span
                                        class="__cf_email__">contact@domain.com</span></a></p>
                            <p class="text-paragraph mb-0">Phone: +1 (23) 456 789</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /modal delivery_return -->
        

{{-- <script>
$(document).ready(function() {
    $('input[name="size1"]').on('change', function() {
        var selectedSize = $('label[for="' + $(this).attr('id') + '"]').data('value');
        $('.variant-picker-label-value').text(selectedSize);
    });
});
</script>

<script>
$(document).ready(function() {
    // Update size label on size change
    $('input[name="size1"]').on('change', function() {
        var selectedSize = $('label[for="' + $(this).attr('id') + '"]').data('value');
        $('.variant-picker-label-value').text(selectedSize);
    });

    // Update color label and images on color change
    $('input[name="color1"]').on('change', function() {
        var selectedColorName = $(this).data('color-name');
        $('.value-currentColor').text(selectedColorName);

        var selectedColor = $('label[for="' + $(this).attr('id') + '"]').data('value');

        // Hide all color images
        $('.tf-product-media-main .swiper-slide').hide();
        $('.tf-product-media-thumbs .swiper-slide').hide();

        // Show images matching selected color (case insensitive)
        $('.tf-product-media-main .swiper-slide').each(function() {
            if ($(this).data('color').toLowerCase() === selectedColor.toLowerCase()) {
                $(this).show();
            }
        });
        $('.tf-product-media-thumbs .swiper-slide').each(function() {
            if ($(this).data('color').toLowerCase() === selectedColor.toLowerCase()) {
                $(this).show();
            }
        });
    });

    // Trigger change on page load to set initial images visibility
    $('input[name="color1"]:checked').trigger('change');
});

document.querySelectorAll('input[name="color1"]').forEach(input => {
    input.addEventListener('change', function() {
        const colorName = this.dataset.colorName; // <- use data-color-name
        document.querySelector('.value-currentColor').textContent = colorName;
    });
});

</script> --}}

{{-- <script>
$(document).ready(function() {
    var selectedColorId = '';
    var selectedColorCode = '';
    var selectedColorName = '';
    var selectedSizeId = '';
    var selectedSizeName = '';

    // Set default color and size
    $('input[name="color1"]:first').prop('checked', true).trigger('change');
    $('input[name="size1"]:first').prop('checked', true).trigger('change');

    // Update size label on size change
    $('input[name="size1"]').on('change', function() {
        selectedSizeId = $(this).val();
        selectedSizeName = $('label[for="' + $(this).attr('id') + '"]').find('.size-current').text();
        $('.size-current').text(selectedSizeName);
    });

    // Update color label and images on color change
    $('input[name="color1"]').on('change', function() {
        selectedColorId = $(this).val();
        selectedColorCode = $('label[for="' + $(this).attr('id') + '"]').data('color');
        selectedColorName = $('label[for="' + $(this).attr('id') + '"]').data('colorName');
        $('.value-currentColor').text(selectedColorName);

        // Hide all color images
        $('.tf-product-media-main .swiper-slide').hide();
        $('.tf-product-media-thumbs .swiper-slide').hide();

        // Show images matching selected color (case insensitive)
        $('.tf-product-media-main .swiper-slide').each(function() {
            if ($(this).data('color').toLowerCase() === selectedColorCode.toLowerCase()) {
                $(this).show();
            }
        });
        $('.tf-product-media-thumbs .swiper-slide').each(function() {
            if ($(this).data('color').toLowerCase() === selectedColorCode.toLowerCase()) {
                $(this).show();
            }
        });
    });

    // Trigger change on page load to set initial images visibility
    $('input[name="color1"]:checked').trigger('change');

    // Add to cart button click
    $('.btn-add-to-cart').on('click', function() {
        console.log('Add to cart button clicked');
        var productId = {{ $product->id }};
        var quantity = $('.quantity-product').val();
        console.log('Product ID:', productId);
        console.log('Quantity:', quantity);
        console.log('Selected Color ID:', selectedColorId);
        console.log('Selected Size ID:', selectedSizeId);

        var ajaxData = {
            _token: '{{ csrf_token() }}',
            product_id: productId,
            color_id: selectedColorId,
            size_id: selectedSizeId,
            quantity: quantity
        };
        console.log('AJAX Data:', ajaxData);

        $.ajax({
            url: '{{ route("cart.add") }}',
            method: 'POST',
            data: ajaxData,
            success: function(response) {
                console.log('AJAX Success:', response);
                if (response.success) {
                    alert('Product added to cart!');
                    // Optionally update cart count or refresh cart modal
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr) {
                console.log('AJAX Error:', xhr);
                alert('Error adding to cart');
            }
        });
    });
});
</script> --}}
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    // console.log("Shop details script loaded!");

$(document).ready(function() {
    var selectedColorId = '';
    var selectedColorCode = '';
    var selectedColorName = '';
    var selectedSizeId = '';
    var selectedSizeName = '';

    // --- Default selection ---
    $('input[name="color1"]:first').prop('checked', true).trigger('change');
    $('input[name="size1"]:first').prop('checked', true).trigger('change');

    // --- Size change ---
    $('input[name="size1"]').on('change', function() {
        selectedSizeId = $(this).val();
        selectedSizeName = $('label[for="' + $(this).attr('id') + '"]').data('value');
        $('.size-current').text(selectedSizeName);
    });

    // --- Color change ---
    $('input[name="color1"]').on('change', function() {
        selectedColorId = $(this).val();
        selectedColorCode = $('label[for="' + $(this).attr('id') + '"]').data('color');
        selectedColorName = $('label[for="' + $(this).attr('id') + '"]').data('value');
        $('.value-currentColor').text(selectedColorName);

        // Hide all color images
        $('.tf-product-media-main .swiper-slide, .tf-product-media-thumbs .swiper-slide').hide();

        // Show images matching selected color
        $('.tf-product-media-main .swiper-slide, .tf-product-media-thumbs .swiper-slide').each(function() {
            if ($(this).data('color').toLowerCase() === selectedColorCode.toLowerCase()) {
                $(this).show();
            }
        });
    });

    // Trigger default
    $('input[name="color1"]:checked').trigger('change');

    // --- Add to cart button ---
    $(document).on('click', '.btn-add-to-cart', function(e) {
        e.preventDefault();
        var productId = {{ $product->id }};
        var quantity = $('.quantity-product').val();

        // validate selections
        if (!selectedColorId || !selectedSizeId) {
            alert('Please select color and size before adding to cart.');
            return;
        }

        var ajaxData = {
            _token: '{{ csrf_token() }}',
            product_id: productId,
            color_id: selectedColorId,
            size_id: selectedSizeId,
            quantity: quantity
        };

        // disable button during request
        $('.btn-add-to-cart').prop('disabled', true);

        $.ajax({
            url: '{{ route("cart.add") }}',
            method: 'POST',
            data: ajaxData,
            success: function(response) {
                console.log('AJAX Success:', response);
                if (response.success) {
                    window.location.href = '{{ route("cart.products") }}';
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr) {
                console.log('AJAX Error:', xhr);
                alert('Error adding to cart');
            },
            complete: function() {
                $('.btn-add-to-cart').prop('disabled', false);
            }
        });
    });

    // --- Function to refresh cart modal ---
    function updateCartUI() {
        $.ajax({
            url: '{{ route("cart.get") }}',
            method: 'GET',
            success: function(response) {
                let cartBody = $('.tf-mini-cart-items');
                cartBody.empty();

                if (response.items.length === 0) {
                    cartBody.append('<p class="text-center">Your cart is empty.</p>');
                    $('.tf-totals-total-value').text('&#2547;0');
                    $('.cart-count').text('0');
                    return;
                }

                response.items.forEach(item => {
                    cartBody.append(`
                        <div class="tf-mini-cart-item d-flex">
                            <div class="image">
                                <a href="/shop-section-details/${item.product_slug}"><img src="${item.image_path}" alt="${item.product_name}"></a>
                            </div>
                            <div class="content">
                                <div class="cart-title"><a href="/shop-section-details/${item.product_slug}">${item.product_name}</a></div>
                                <div class="variant">${item.color_name} / ${item.size_name}</div>
                                <div class="count-price d-flex align-items-center justify-content-between">
                                    <div class="quantity">
                                        <span class="btn-quantity btn-decrease">-</span>
                                        <input type="text" class="quantity-input" value="${item.quantity}" readonly>
                                        <span class="btn-quantity btn-increase">+</span>
                                    </div>
                                    <div class="price"> &#2547;${item.selling_price}</div>
                                </div>
                                <div class="remove"><a href="#" class="remove-cart-item" data-key="${item.rowId}"><i class="icon icon-delete"></i></a></div>
                            </div>
                        </div>
                    `);
                });

                $('.tf-totals-total-value').text(`&#2547;${response.total}`);
                $('.cart-count').text(response.count);
            }
        });
    }

    // --- Remove item ---
    $(document).on('click', '.remove-cart-item', function() {
        let rowId = $(this).data('key');

        $.ajax({
            url: '{{ route("cart.remove") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                rowId: rowId
            },
            success: function(response) {
                if (response.success) {
                    updateCartUI();
                    alert('Item removed from cart.');
                }
            }
        });
    });

    // --- Update quantity in modal ---
    $(document).on('click', '.btn-increase', function() {
        let input = $(this).siblings('.quantity-input');
        let newQty = parseInt(input.val()) + 1;
        input.val(newQty);
        let rowId = $(this).closest('.tf-mini-cart-item').find('.remove-cart-item').data('key');
        updateQuantity(rowId, newQty);
    });

    $(document).on('click', '.btn-decrease', function() {
        let input = $(this).siblings('.quantity-input');
        let newQty = parseInt(input.val()) - 1;
        if (newQty < 1) return;
        input.val(newQty);
        let rowId = $(this).closest('.tf-mini-cart-item').find('.remove-cart-item').data('key');
        updateQuantity(rowId, newQty);
    });

    function updateQuantity(rowId, qty) {
        $.ajax({
            url: '{{ route("cart.update") }}',
            method: 'POST',
            data: { _token: '{{ csrf_token() }}', rowId: rowId, quantity: qty },
            success: function(response) {
                if (response.success) {
                    updateCartUI();
                }
            }
        });
    }

    // Initial cart load (optional)
    updateCartUI();
});
</script>



@endsection

