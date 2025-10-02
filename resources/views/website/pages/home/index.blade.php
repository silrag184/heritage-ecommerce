@extends('website.layout.app')

@section('title')
Home
@endsection

@section('content')
<!-- Slider -->
        <section class="tf-slideshow slideshow-effect slider-effect-fade position-relative">
            <div dir="ltr" class="swiper tf-sw-effect">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" lazy="true">
                        <div class="slider-effect wrap-slider">
                            <div class="content-left">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="box-content">
                                                <h1 class="heading fade-item fade-item-1">Summer<br> Escapades</h1>
                                                <p class="desc fade-item fade-item-2">Embrace the sun-kissed season with
                                                    our collection of breezy</p>
                                                <a href="shop-collection-list.html"
                                                    class="fade-item fade-item-3 tf-btn btn-light-icon animate-hover-btn btn-xl radius-3"><span>Shop
                                                        collection</span><i class="icon icon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="img-slider">
                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/slider/fashion-06-slide1.jpg"
                                    alt="fashion-slideshow" src="{{asset('/')}}website/assets/images/slider/fashion-06-slide1.jpg"
                                    alt="fashion-slideshow">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="slider-effect wrap-slider">
                            <div class="content-left">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="box-content">
                                                <h1 class="heading fade-item fade-item-1">Multi-faceted<br> Beauty</h1>
                                                <p class="desc fade-item fade-item-2">Embrace the sun-kissed season with
                                                    our collection of breezy</p>
                                                <a href="shop-collection-list.html"
                                                    class="fade-item fade-item-3 tf-btn btn-light-icon animate-hover-btn btn-xl radius-3"><span>Shop
                                                        collection</span><i class="icon icon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="img-slider">
                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/slider/fashion-06-slide2.jpg"
                                    src="{{asset('/')}}website/assets/images/slider/fashion-06-slide2.jpg" alt="fashion-slideshow">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="slider-effect wrap-slider">
                            <div class="content-left">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="box-content">
                                                <h1 class="heading fade-item fade-item-1">Effortless<br> Elegance</h1>
                                                <p class="desc fade-item fade-item-2">Embrace the sun-kissed season with
                                                    our collection of breezy</p>
                                                <a href="shop-collection-list.html"
                                                    class="fade-item fade-item-3 tf-btn btn-light-icon animate-hover-btn btn-xl radius-3"><span>Shop
                                                        collection</span><i class="icon icon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="img-slider">
                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/slider/fashion-06-slide3.jpg"
                                    src="{{asset('/')}}website/assets/images/slider/fashion-06-slide3.jpg" alt="fashion-slideshow">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="wrap-pagination">
                <div class="container">
                    <div class="sw-dots line-pagination sw-pagination-slider"></div>
                </div>
            </div>
        </section>
        <!-- /Slider -->
        <!-- Collection -->
        <section class="flat-spacing-12 bg_grey-3">
            <div class="container">
                <div class="flat-title flex-row justify-content-between align-items-center px-0 wow fadeInUp"
                    data-wow-delay="0s">
                    <h3 class="title">Season Collection</h3>
                    <a href="shop-collection-sub.html" class="tf-btn btn-line">View all categories<i
                            class="icon icon-arrow1-top-left"></i></a>
                </div>
                <div class="hover-sw-nav hover-sw-2">
                    <div dir="ltr" class="swiper tf-sw-collection" data-preview="6" data-tablet="3" data-mobile="2"
                        data-space-lg="50" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item-circle hover-img">
                                    <a href="shop-collection-sub.html" class="collection-image img-style">
                                        <img class="lazyload" data-src="{{asset('/')}}website/assets/images/collections/collection-circle-1.jpg"
                                            src="{{asset('/')}}website/assets/images/collections/collection-circle-1.jpg" alt="collection-img">
                                    </a>
                                    <div class="collection-content text-center">
                                        <a href="shop-collection-sub.html" class="link title fw-5">Women’s</a>
                                        <div class="count">23 items</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item-circle hover-img">
                                    <a href="shop-collection-sub.html" class="collection-image img-style">
                                        <img class="lazyload" data-src="{{asset('/')}}website/assets/images/collections/collection-circle-2.jpg"
                                            src="{{asset('/')}}website/assets/images/collections/collection-circle-2.jpg" alt="collection-img">
                                    </a>
                                    <div class="collection-content text-center">
                                        <a href="shop-collection-sub.html" class="link title fw-5">Men’s</a>
                                        <div class="count">9 items</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item-circle hover-img">
                                    <a href="shop-collection-sub.html" class="collection-image img-style">
                                        <img class="lazyload" data-src="{{asset('/')}}website/assets/images/collections/collection-circle-3.jpg"
                                            src="{{asset('/')}}website/assets/images/collections/collection-circle-3.jpg" alt="collection-img">
                                    </a>
                                    <div class="collection-content text-center">
                                        <a href="shop-collection-sub.html" class="link title fw-5">Jewelry</a>
                                        <div class="count">31 items</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item-circle hover-img">
                                    <a href="shop-collection-sub.html" class="collection-image img-style">
                                        <img class="lazyload" data-src="{{asset('/')}}website/assets/images/collections/collection-circle-4.jpg"
                                            src="{{asset('/')}}website/assets/images/collections/collection-circle-4.jpg" alt="collection-img">
                                    </a>
                                    <div class="collection-content text-center">
                                        <a href="shop-collection-sub.html" class="link title fw-5">Sneakers</a>
                                        <div class="count">21 items </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item-circle hover-img">
                                    <a href="shop-collection-sub.html" class="collection-image img-style">
                                        <img class="lazyload" data-src="{{asset('/')}}website/assets/images/collections/collection-circle-5.jpg"
                                            src="{{asset('/')}}website/assets/images/collections/collection-circle-5.jpg" alt="collection-img">
                                    </a>
                                    <div class="collection-content text-center">
                                        <a href="shop-collection-sub.html" class="link title fw-5">Bags</a>
                                        <div class="count">5 items </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item-circle hover-img">
                                    <a href="shop-collection-sub.html" class="collection-image img-style">
                                        <img class="lazyload" data-src="{{asset('/')}}website/assets/images/collections/collection-circle-6.jpg"
                                            src="{{asset('/')}}website/assets/images/collections/collection-circle-6.jpg" alt="collection-img">
                                    </a>
                                    <div class="collection-content text-center">
                                        <a href="shop-collection-sub.html" class="link title fw-5">Glasses</a>
                                        <div class="count">14 items</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item-circle hover-img">
                                    <a href="shop-collection-sub.html" class="collection-image img-style">
                                        <img class="lazyload" data-src="{{asset('/')}}website/assets/images/collections/collection-circle-7.jpg"
                                            src="{{asset('/')}}website/assets/images/collections/collection-circle-7.jpg" alt="collection-img">
                                    </a>
                                    <div class="collection-content text-center">
                                        <a href="shop-collection-sub.html" class="link title fw-5">New arrivals</a>
                                        <div class="count">31 items </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sw-dots style-2 sw-pagination-collection justify-content-center"></div>
                    <div class="nav-sw nav-next-slider nav-next-collection"><span class="icon icon-arrow-left"></span>
                    </div>
                    <div class="nav-sw nav-prev-slider nav-prev-collection"><span class="icon icon-arrow-right"></span>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Collection -->
        <!-- Sale Product -->
        <section class="flat-spacing-17">
            <div class="container">
                <div class="flat-animate-tab">
                    <ul class="widget-tab-3 d-flex justify-content-center wow fadeInUp" data-wow-delay="0s"
                        role="tablist">
                        <li class="nav-tab-item" role="presentation">
                            <a href="#bestSeller" class="active" data-bs-toggle="tab">Best seller</a>
                        </li>
                        <li class="nav-tab-item" role="presentation">
                            <a href="#newArrivals" data-bs-toggle="tab">New arrivals</a>
                        </li>
                        <li class="nav-tab-item" role="presentation">
                            <a href="#onSale" data-bs-toggle="tab">On Sale</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="bestSeller" role="tabpanel">
                            <div class="grid-layout loadmore-item" data-grid="grid-4">
                                <!-- card product 1 -->
                                <div class="card-product fl-item">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/orange-1.jpg"
                                                src="{{asset('/')}}website/assets/images/products/orange-1.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/white-1.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-1.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed Tank Top</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Orange</span>
                                                <span class="swatch-value bg_orange-3"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/orange-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/orange-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-1.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 2 -->
                                <div class="card-product fl-item">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/brown.jpg"
                                                src="{{asset('/')}}website/assets/images/products/brown.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/purple.jpg"
                                                src="{{asset('/')}}website/assets/images/products/purple.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="on-sale-wrap text-end">
                                            <div class="on-sale-item">-33%</div>
                                        </div>
                                        <div class="countdown-box">
                                            <div class="js-countdown" data-timer="1007500" data-labels="d :,h :,m :,s">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed modal T-shirt</a>
                                        <span class="price">From $18.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Brown</span>
                                                <span class="swatch-value bg_brown"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/brown.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/brown.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Purple</span>
                                                <span class="swatch-value bg_purple"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/purple.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/purple.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Green</span>
                                                <span class="swatch-value bg_light-green"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/green.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/green.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 3 -->
                                <div class="card-product fl-item">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/white-3.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-3.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/white-4.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-4.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#shoppingCart" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Add to cart</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Oversized Printed T-shirt</a>
                                        <span class="price">$10.00</span>
                                    </div>
                                </div>
                                <!-- card product 4 -->
                                <div class="card-product fl-item">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/white-2.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-2.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/pink-1.jpg"
                                                src="{{asset('/')}}website/assets/images/products/pink-1.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title">Oversized Printed T-shirt</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Pink</span>
                                                <span class="swatch-value bg_purple"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/pink-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/pink-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-2.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 5 -->
                                <div class="card-product fl-item">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/brown-2.jpg"
                                                src="{{asset('/')}}website/assets/images/products/brown-2.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/brown-3.jpg"
                                                src="{{asset('/')}}website/assets/images/products/brown-3.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">V-neck linen T-shirt</a>
                                        <span class="price">$114.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Brown</span>
                                                <span class="swatch-value bg_brown"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/brown-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/brown-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-5.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-5.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 6 -->
                                <div class="card-product fl-item">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product"
                                                data-src="{{asset('/')}}website/assets/images/products/light-green-1.jpg"
                                                src="{{asset('/')}}website/assets/images/products/light-green-1.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/light-green-2.jpg"
                                                src="{{asset('/')}}website/assets/images/products/light-green-2.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn absolute-2">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Loose Fit Sweatshirt</a>
                                        <span class="price">$10.00</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Light Green</span>
                                                <span class="swatch-value bg_light-green"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/light-green-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/light-green-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-3.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-3.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Blue</span>
                                                <span class="swatch-value bg_blue-2"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/blue.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/blue.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Dark Blue</span>
                                                <span class="swatch-value bg_dark-blue"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/dark-blue.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/dark-blue.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-6.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-6.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Grey</span>
                                                <span class="swatch-value bg_light-grey"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/light-grey.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/light-grey.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 7 -->
                                <div class="card-product fl-item">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/black-4.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-4.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-5.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-5.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Regular Fit Oxford Shirt</a>
                                        <span class="price">$10.00</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-4.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-4.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Dark Blue</span>
                                                <span class="swatch-value bg_dark-blue"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/dark-blue-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/dark-blue-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Beige</span>
                                                <span class="swatch-value bg_beige"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/beige.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/beige.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Blue</span>
                                                <span class="swatch-value bg_light-blue"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/light-blue.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/light-blue.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-7.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-7.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 8 -->
                                <div class="card-product fl-item">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/white-8.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-8.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-6.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-6.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Loose Fit Hoodie</a>
                                        <span class="price">$9.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-8.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-8.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-7.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-7.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Blue</span>
                                                <span class="swatch-value bg_blue-2"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/blue-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/blue-2.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 9 -->
                                <div class="card-product fl-item">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/brown-4.jpg"
                                                src="{{asset('/')}}website/assets/images/products/brown-4.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-8.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-8.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Patterned scarf</a>
                                        <span class="price">$14.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Brown</span>
                                                <span class="swatch-value bg_brown"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/brown-4.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/brown-4.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-8.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-8.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 10 -->
                                <div class="card-product fl-item">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/black-9.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-9.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-10.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-10.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Slim Fit Fine-knit Turtleneck
                                            Sweater</a>
                                        <span class="price">$18.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-9.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-9.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-9.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-9.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 11 -->
                                <div class="card-product fl-item">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/grey-2.jpg"
                                                src="{{asset('/')}}website/assets/images/products/grey-2.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/grey.jpg"
                                                src="{{asset('/')}}website/assets/images/products/grey.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Slim Fit Fine-knit Turtleneck
                                            Sweater</a>
                                        <span class="price">$18.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Grey</span>
                                                <span class="swatch-value bg_grey"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/grey-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/grey-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Pink</span>
                                                <span class="swatch-value bg_pink"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/pink-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/pink-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Pink</span>
                                                <span class="swatch-value bg_light-pink"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/light-pink.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/light-pink.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 12 -->
                                <div class="card-product fl-item">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/black-11.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-11.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-12.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-12.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Slim Fit Fine-knit Turtleneck
                                            Sweater</a>
                                        <span class="price">$18.95</span>

                                    </div>
                                </div>
                            </div>
                            <div class="tf-pagination-wrap view-more-button text-center">
                                <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore "><span
                                        class="text">Load more</span></button>
                            </div>
                        </div>
                        <div class="tab-pane" id="newArrivals" role="tabpanel">
                            <div class="grid-layout loadmore-item2" data-grid="grid-4">
                                <!-- card product 1 -->
                                <div class="card-product fl-item2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/orange-1.jpg"
                                                src="{{asset('/')}}website/assets/images/products/orange-1.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/white-1.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-1.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed Tank Top</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Orange</span>
                                                <span class="swatch-value bg_orange-3"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/orange-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/orange-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-1.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 2 -->
                                <div class="card-product fl-item2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/brown.jpg"
                                                src="{{asset('/')}}website/assets/images/products/brown.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/purple.jpg"
                                                src="{{asset('/')}}website/assets/images/products/purple.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="on-sale-wrap text-end">
                                            <div class="on-sale-item">-33%</div>
                                        </div>
                                        <div class="countdown-box">
                                            <div class="js-countdown" data-timer="1007500" data-labels="d :,h :,m :,s">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed modal T-shirt</a>
                                        <span class="price">From $18.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Brown</span>
                                                <span class="swatch-value bg_brown"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/brown.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/brown.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Purple</span>
                                                <span class="swatch-value bg_purple"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/purple.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/purple.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Green</span>
                                                <span class="swatch-value bg_light-green"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/green.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/green.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 3 -->
                                <div class="card-product fl-item2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/white-3.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-3.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/white-4.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-4.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#shoppingCart" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Add to cart</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Oversized Printed T-shirt</a>
                                        <span class="price">$10.00</span>
                                    </div>
                                </div>
                                <!-- card product 4 -->
                                <div class="card-product fl-item2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/white-2.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-2.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/pink-1.jpg"
                                                src="{{asset('/')}}website/assets/images/products/pink-1.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title">Oversized Printed T-shirt</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Pink</span>
                                                <span class="swatch-value bg_purple"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/pink-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/pink-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-2.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 5 -->
                                <div class="card-product fl-item2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/brown-2.jpg"
                                                src="{{asset('/')}}website/assets/images/products/brown-2.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/brown-3.jpg"
                                                src="{{asset('/')}}website/assets/images/products/brown-3.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">V-neck linen T-shirt</a>
                                        <span class="price">$114.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Brown</span>
                                                <span class="swatch-value bg_brown"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/brown-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/brown-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-5.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-5.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 6 -->
                                <div class="card-product fl-item2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product"
                                                data-src="{{asset('/')}}website/assets/images/products/light-green-1.jpg"
                                                src="{{asset('/')}}website/assets/images/products/light-green-1.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/light-green-2.jpg"
                                                src="{{asset('/')}}website/assets/images/products/light-green-2.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn absolute-2">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Loose Fit Sweatshirt</a>
                                        <span class="price">$10.00</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Light Green</span>
                                                <span class="swatch-value bg_light-green"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/light-green-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/light-green-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-3.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-3.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Blue</span>
                                                <span class="swatch-value bg_blue-2"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/blue.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/blue.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Dark Blue</span>
                                                <span class="swatch-value bg_dark-blue"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/dark-blue.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/dark-blue.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-6.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-6.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Grey</span>
                                                <span class="swatch-value bg_light-grey"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/light-grey.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/light-grey.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 7 -->
                                <div class="card-product fl-item2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/black-4.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-4.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-5.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-5.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Regular Fit Oxford Shirt</a>
                                        <span class="price">$10.00</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-4.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-4.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Dark Blue</span>
                                                <span class="swatch-value bg_dark-blue"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/dark-blue-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/dark-blue-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Beige</span>
                                                <span class="swatch-value bg_beige"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/beige.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/beige.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Blue</span>
                                                <span class="swatch-value bg_light-blue"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/light-blue.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/light-blue.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-7.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-7.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 8 -->
                                <div class="card-product fl-item2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/white-8.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-8.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-6.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-6.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Loose Fit Hoodie</a>
                                        <span class="price">$9.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-8.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-8.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-7.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-7.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Blue</span>
                                                <span class="swatch-value bg_blue-2"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/blue-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/blue-2.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 9 -->
                                <div class="card-product fl-item2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/brown-4.jpg"
                                                src="{{asset('/')}}website/assets/images/products/brown-4.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-8.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-8.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Patterned scarf</a>
                                        <span class="price">$14.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Brown</span>
                                                <span class="swatch-value bg_brown"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/brown-4.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/brown-4.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-8.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-8.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 10 -->
                                <div class="card-product fl-item2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/black-9.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-9.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-10.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-10.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Slim Fit Fine-knit Turtleneck
                                            Sweater</a>
                                        <span class="price">$18.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-9.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-9.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-9.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-9.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 11 -->
                                <div class="card-product fl-item2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/grey-2.jpg"
                                                src="{{asset('/')}}website/assets/images/products/grey-2.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/grey.jpg"
                                                src="{{asset('/')}}website/assets/images/products/grey.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Slim Fit Fine-knit Turtleneck
                                            Sweater</a>
                                        <span class="price">$18.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Grey</span>
                                                <span class="swatch-value bg_grey"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/grey-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/grey-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Pink</span>
                                                <span class="swatch-value bg_pink"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/pink-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/pink-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Pink</span>
                                                <span class="swatch-value bg_light-pink"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/light-pink.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/light-pink.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 12 -->
                                <div class="card-product fl-item2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/black-11.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-11.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-12.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-12.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Slim Fit Fine-knit Turtleneck
                                            Sweater</a>
                                        <span class="price">$18.95</span>

                                    </div>
                                </div>
                            </div>
                            <div class="tf-pagination-wrap view-more-button2 text-center">
                                <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore2"><span
                                        class="text">Load more</span></button>
                            </div>
                        </div>
                        <div class="tab-pane" id="onSale" role="tabpanel">
                            <div class="grid-layout loadmore-item3" data-grid="grid-4">
                                <!-- card product 1 -->
                                <div class="card-product fl-item3">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/orange-1.jpg"
                                                src="{{asset('/')}}website/assets/images/products/orange-1.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/white-1.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-1.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed Tank Top</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Orange</span>
                                                <span class="swatch-value bg_orange-3"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/orange-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/orange-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-1.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 2 -->
                                <div class="card-product fl-item3">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/brown.jpg"
                                                src="{{asset('/')}}website/assets/images/products/brown.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/purple.jpg"
                                                src="{{asset('/')}}website/assets/images/products/purple.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="on-sale-wrap text-end">
                                            <div class="on-sale-item">-33%</div>
                                        </div>
                                        <div class="countdown-box">
                                            <div class="js-countdown" data-timer="1007500" data-labels="d :,h :,m :,s">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed modal T-shirt</a>
                                        <span class="price">From $18.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Brown</span>
                                                <span class="swatch-value bg_brown"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/brown.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/brown.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Purple</span>
                                                <span class="swatch-value bg_purple"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/purple.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/purple.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Green</span>
                                                <span class="swatch-value bg_light-green"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/green.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/green.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 3 -->
                                <div class="card-product fl-item3">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/white-3.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-3.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/white-4.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-4.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#shoppingCart" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Add to cart</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Oversized Printed T-shirt</a>
                                        <span class="price">$10.00</span>
                                    </div>
                                </div>
                                <!-- card product 4 -->
                                <div class="card-product fl-item3">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/white-2.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-2.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/pink-1.jpg"
                                                src="{{asset('/')}}website/assets/images/products/pink-1.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title">Oversized Printed T-shirt</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Pink</span>
                                                <span class="swatch-value bg_purple"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/pink-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/pink-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-2.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 5 -->
                                <div class="card-product fl-item3">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/brown-2.jpg"
                                                src="{{asset('/')}}website/assets/images/products/brown-2.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/brown-3.jpg"
                                                src="{{asset('/')}}website/assets/images/products/brown-3.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">V-neck linen T-shirt</a>
                                        <span class="price">$114.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Brown</span>
                                                <span class="swatch-value bg_brown"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/brown-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/brown-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-5.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-5.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 6 -->
                                <div class="card-product fl-item3">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product"
                                                data-src="{{asset('/')}}website/assets/images/products/light-green-1.jpg"
                                                src="{{asset('/')}}website/assets/images/products/light-green-1.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/light-green-2.jpg"
                                                src="{{asset('/')}}website/assets/images/products/light-green-2.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn absolute-2">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Loose Fit Sweatshirt</a>
                                        <span class="price">$10.00</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Light Green</span>
                                                <span class="swatch-value bg_light-green"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/light-green-1.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/light-green-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-3.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-3.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Blue</span>
                                                <span class="swatch-value bg_blue-2"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/blue.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/blue.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Dark Blue</span>
                                                <span class="swatch-value bg_dark-blue"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/dark-blue.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/dark-blue.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-6.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-6.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Grey</span>
                                                <span class="swatch-value bg_light-grey"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/light-grey.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/light-grey.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 7 -->
                                <div class="card-product fl-item3">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/black-4.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-4.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-5.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-5.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Regular Fit Oxford Shirt</a>
                                        <span class="price">$10.00</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-4.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-4.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Dark Blue</span>
                                                <span class="swatch-value bg_dark-blue"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/dark-blue-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/dark-blue-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Beige</span>
                                                <span class="swatch-value bg_beige"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/beige.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/beige.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Blue</span>
                                                <span class="swatch-value bg_light-blue"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/light-blue.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/light-blue.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-7.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-7.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 8 -->
                                <div class="card-product fl-item3">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/white-8.jpg"
                                                src="{{asset('/')}}website/assets/images/products/white-8.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-6.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-6.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Loose Fit Hoodie</a>
                                        <span class="price">$9.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-8.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-8.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-7.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-7.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Blue</span>
                                                <span class="swatch-value bg_blue-2"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/blue-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/blue-2.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 9 -->
                                <div class="card-product fl-item3">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/brown-4.jpg"
                                                src="{{asset('/')}}website/assets/images/products/brown-4.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-8.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-8.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Patterned scarf</a>
                                        <span class="price">$14.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Brown</span>
                                                <span class="swatch-value bg_brown"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/brown-4.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/brown-4.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-8.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-8.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 10 -->
                                <div class="card-product fl-item3">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/black-9.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-9.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-10.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-10.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Slim Fit Fine-knit Turtleneck
                                            Sweater</a>
                                        <span class="price">$18.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/black-9.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/black-9.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/white-9.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/white-9.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 11 -->
                                <div class="card-product fl-item3">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/grey-2.jpg"
                                                src="{{asset('/')}}website/assets/images/products/grey-2.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/grey.jpg"
                                                src="{{asset('/')}}website/assets/images/products/grey.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Slim Fit Fine-knit Turtleneck
                                            Sweater</a>
                                        <span class="price">$18.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Grey</span>
                                                <span class="swatch-value bg_grey"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/grey-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/grey-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Pink</span>
                                                <span class="swatch-value bg_pink"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/pink-2.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/pink-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Pink</span>
                                                <span class="swatch-value bg_light-pink"></span>
                                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/products/light-pink.jpg"
                                                    src="{{asset('/')}}website/assets/images/products/light-pink.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- card product 12 -->
                                <div class="card-product fl-item3">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('/')}}website/assets/images/products/black-11.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-11.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('/')}}website/assets/images/products/black-12.jpg"
                                                src="{{asset('/')}}website/assets/images/products/black-12.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                                class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                                class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Slim Fit Fine-knit Turtleneck
                                            Sweater</a>
                                        <span class="price">$18.95</span>

                                    </div>
                                </div>
                            </div>
                            <div class="tf-pagination-wrap view-more-button3 text-center">
                                <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore3"><span
                                        class="text">Load more</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Sale Product -->
        <!-- Banner Collection -->
        <section>
            <div class="container-full">
                <div dir="ltr" class="swiper tf-sw-recent" data-preview="3" data-tablet="3" data-mobile="1.3"
                    data-space-lg="30" data-space-md="15" data-space="15" data-pagination="1" data-pagination-md="1"
                    data-pagination-lg="1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" lazy="true">
                            <div class="collection-item-v4 hover-img">
                                <div class="collection-inner">
                                    <a href="shop-collection-sub.html" class="collection-image img-style">
                                        <img class="lazyload" data-src="{{asset('/')}}website/assets/images/collections/collection-39.jpg"
                                            src="{{asset('/')}}website/assets/images/collections/collection-39.jpg" alt="collection-img">
                                    </a>
                                    <div class="collection-content wow fadeInUp" data-wow-delay="0s">
                                        <p class="subheading">UP TO 30% OFF</p>
                                        <h5 class="heading">Essential Basics</h5>
                                        <a href="shop-collection-sub.html"
                                            class="tf-btn style-3 fw-6 btn-light-icon radius-3 animate-hover-btn"><span>Shop
                                                now</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="collection-item-v4 hover-img">
                                <div class="collection-inner">
                                    <a href="shop-collection-sub.html" class="collection-image img-style">
                                        <img class="lazyload" data-src="{{asset('/')}}website/assets/images/collections/collection-40.jpg"
                                            src="{{asset('/')}}website/assets/images/collections/collection-40.jpg" alt="collection-img">
                                    </a>
                                    <div class="collection-content wow fadeInUp" data-wow-delay="0s">
                                        <p class="subheading">UP TO 30% OFF</p>
                                        <h5 class="heading">Athleisure Wear</h5>
                                        <a href="shop-collection-sub.html"
                                            class="tf-btn style-3 fw-6 btn-light-icon radius-3 animate-hover-btn"><span>Shop
                                                now</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="collection-item-v4 hover-img">
                                <div class="collection-inner">
                                    <a href="shop-collection-sub.html" class="collection-image img-style">
                                        <img class="lazyload" data-src="{{asset('/')}}website/assets/images/collections/collection-41.jpg"
                                            src="{{asset('/')}}website/assets/images/collections/collection-41.jpg" alt="collection-img">
                                    </a>
                                    <div class="collection-content wow fadeInUp" data-wow-delay="0s">
                                        <p class="subheading">UP TO 30% OFF</p>
                                        <h5 class="heading">Seasonal Favorites</h5>
                                        <a href="shop-collection-sub.html"
                                            class="tf-btn style-3 fw-6 btn-light-icon radius-3 animate-hover-btn"><span>Shop
                                                now</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Banner Collection -->
        <!-- Icon box -->
        <section class="flat-spacing-1 flat-iconbox">
            <div class="container">
                <div class="wrap-carousel wrap-mobile wow fadeInUp" data-wow-delay="0s">
                    <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                        <div class="swiper-wrapper wrap-iconbox">
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-row">
                                    <div class="icon">
                                        <i class="icon-shipping"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title fw-4">Free Shipping</div>
                                        <p>Free shipping over order $120</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-row">
                                    <div class="icon">
                                        <i class="icon-payment fs-22"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title fw-4">Flexible Payment</div>
                                        <p>Pay with Multiple Credit Cards</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-row">
                                    <div class="icon">
                                        <i class="icon-return fs-20"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title fw-4">14 Day Returns</div>
                                        <p>Within 30 days for an exchange</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-row">
                                    <div class="icon">
                                        <i class="icon-suport"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title fw-4">Premium Support</div>
                                        <p>Outstanding premium support</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
                </div>
            </div>
        </section>
        <!-- /Icon box -->
        <!-- brand -->
        <section class="flat-spacing-1">
            <div class="container">
                <div dir="ltr" class="swiper tf-sw-brand" data-loop="false" data-play="false" data-preview="6"
                    data-tablet="3" data-mobile="2" data-space-lg="0" data-space-md="0">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/brand/brand-01.png"
                                    src="{{asset('/')}}website/assets/images/brand/brand-01.png" alt="image-brand">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/brand/brand-02.png"
                                    src="{{asset('/')}}website/assets/images/brand/brand-02.png" alt="image-brand">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/brand/brand-03.png"
                                    src="{{asset('/')}}website/assets/images/brand/brand-03.png" alt="image-brand">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/brand/brand-04.png"
                                    src="{{asset('/')}}website/assets/images/brand/brand-04.png" alt="image-brand">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/brand/brand-05.png"
                                    src="{{asset('/')}}website/assets/images/brand/brand-05.png" alt="image-brand">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img class="lazyload" data-src="{{asset('/')}}website/assets/images/brand/brand-06.png"
                                    src="{{asset('/')}}website/assets/images/brand/brand-06.png" alt="image-brand">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-dots style-2 sw-pagination-brand justify-content-center"></div>
            </div>
        </section>
        <!-- /brand -->
@endsection