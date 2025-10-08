@extends('website.layout.app')

@section('title')
Shop
@endsection

@section('content')
<!-- page-title -->
<div class="tf-page-title">
    <div class="container-full">
        <div class="heading text-center">New Arrival</div>
        <p class="text-center text-2 text_black-2 mt_5">Shop through our latest selection of Fashion</p>
    </div>
</div>
<!-- /page-title -->
<!-- Collection -->
<section class="flat-spacing-3 pb_0">
    <div class="container">
        <div class="hover-sw-nav">
            <div dir="ltr" class="swiper tf-sw-collection" data-preview="5" data-tablet="3" data-mobile="2"
                data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item style-2 hover-img">
                            <div class="collection-inner">
                                <a href="{{ route('shop.section', ['filter' => 'new_arrival']) }}" class="tf-btn collection-title hover-icon fs-15"><span>New Arrival</span><i
                                        class="icon icon-arrow1-top-left"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Add other collection items here if needed -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Collection -->

<!-- Product Grid -->
<section class="flat-spacing-3 pb_0">
    <div class="container">
        <div class="tf-grid-layout wrapper-shop tf-col-4" id="gridLayout">
            @foreach($products as $product)
            <div class="card-product grid" data-availability="In stock" data-brand="{{ $product->brand->brand_name ?? '' }}">
                <div class="card-product-wrapper">
                    <a href="{{ url('product-detail/'.$product->slug) }}" class="product-img">
                        @if($product->colorImages->first())
                        <img class="lazyload img-product" data-src="{{ asset('uploads/images/products/colors/'.$product->colorImages->first()->image) }}"
                            src="{{ asset('uploads/images/products/'.$product->colorImages->first()->image) }}" alt="image-product">
                        @endif
                        @if($product->colorImages->skip(1)->first())
                        <img class="lazyload img-hover" data-src="{{ asset('uploads/images/products/colors/'.$product->colorImages->skip(1)->first()->image) }}"
                            src="{{ asset('uploads/images/products/'.$product->colorImages->skip(1)->first()->image) }}" alt="image-product">
                        @endif
                    </a>
                    <div class="list-product-btn absolute-2">
                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                            <span class="icon icon-bag"></span>
                            <span class="tooltip">Quick Add</span>
                        </a>
                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                            <span class="icon icon-heart"></span>
                            <span class="tooltip">Add to Wishlist</span>
                            <span class="icon icon-delete"></span>
                        </a>
                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                            <span class="icon icon-compare"></span>
                            <span class="tooltip">Add to Compare</span>
                            <span class="icon icon-check"></span>
                        </a>
                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                            <span class="icon icon-view"></span>
                            <span class="tooltip">Quick View</span>
                        </a>
                    </div>
                    <div class="card-product-info">
                        <a href="{{ url('product-detail/'.$product->slug) }}" class="title link">{{ $product->product_name }}</a>
                        <span class="price current-price">${{ number_format($product->selling_price, 2) }}</span>
                        <ul class="list-color-product">
                            @foreach($product->colorImages as $colorImage)
                            <li class="list-color-item color-swatch">
                                <span class="tooltip">{{ $colorImage->color_name ?? 'Color' }}</span>
                                <span class="swatch-value" style="background-image: url('{{ asset('uploads/images/products/'.$colorImage->image) }}');"></span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- /Product Grid -->

@endsection
