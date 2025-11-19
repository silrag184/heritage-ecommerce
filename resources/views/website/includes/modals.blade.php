<!-- canvasSearch -->
<div class="offcanvas offcanvas-end canvas-search" id="canvasSearch">
    <div class="canvas-wrapper">
        <header class="tf-search-head">
            <div class="title fw-5">
                Search our site
                <div class="close">
                    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
                </div>
            </div>
            <div class="tf-search-sticky">
                <form class="tf-mini-search-frm">
                    <fieldset class="text">
                        <input type="text" placeholder="Search" class="" name="text" tabindex="0"
                            value="" aria-required="true" required="">
                    </fieldset>
                    <button class="" type="submit"><i class="icon-search"></i></button>
                </form>
            </div>
        </header>
        <div class="canvas-body p-0">
            <div class="tf-search-content">
                <div class="tf-cart-hide-has-results">
                    <div class="tf-col-quicklink">
                        <div class="tf-search-content-title fw-5">Quick link</div>
                        <ul class="tf-quicklink-list">
                            <li class="tf-quicklink-item">
                                <a href="shop-default.html" class="">Fashion</a>
                            </li>
                            <li class="tf-quicklink-item">
                                <a href="shop-default.html" class="">Men</a>
                            </li>
                            <li class="tf-quicklink-item">
                                <a href="shop-default.html" class="">Women</a>
                            </li>
                            <li class="tf-quicklink-item">
                                <a href="shop-default.html" class="">Accessories</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tf-col-content">
                        <div class="tf-search-content-title fw-5">Need some inspiration?</div>
                        <div class="tf-search-hidden-inner">
                            <div class="tf-loop-item">
                                <div class="image">
                                    <a href="product-detail.html">
                                        <img src="{{ asset('/') }}website/assets/images/products/white-3.jpg"
                                            alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <a href="product-detail.html">Cotton jersey top</a>
                                    <div class="tf-product-info-price">
                                        <div class="compare-at-price">$10.00</div>
                                        <div class="price-on-sale fw-6">$8.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-loop-item">
                                <div class="image">
                                    <a href="product-detail.html">
                                        <img src="{{ asset('/') }}website/assets/images/products/white-2.jpg"
                                            alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <a href="product-detail.html">Mini crossbody bag</a>
                                    <div class="tf-product-info-price">
                                        <div class="price fw-6">$18.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-loop-item">
                                <div class="image">
                                    <a href="product-detail.html">
                                        <img src="{{ asset('/') }}website/assets/images/products/white-1.jpg"
                                            alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <a href="product-detail.html">Oversized Printed T-shirt</a>
                                    <div class="tf-product-info-price">
                                        <div class="price fw-6">$18.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /canvasSearch -->

<!-- Filter -->
<div class="offcanvas offcanvas-start canvas-filter" id="filterShop">
    <div class="canvas-wrapper">
        <header class="canvas-header">
            <div class="filter-icon">
                <span class="icon icon-filter"></span>
                <span>Filter</span>
            </div>
            <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        </header>
        <div class="canvas-body">
            <div class="widget-facet wd-categories">
                <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true"
                    aria-controls="categories">
                    <span>Product categories</span>
                    <span class="icon icon-arrow-up"></span>
                </div>
                <div id="categories" class="collapse show">
                    <ul class="list-categoris current-scrollbar mb_36">
                        @foreach ($modelCategories as $index => $category)
                            <li class="cate-item {{ $index == 0 ? 'current' : '' }}">
                                <a href="#"><span>{{ $category->title }}</span></a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <form action="#" id="facet-filter-form" class="facet-filter-form">
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#availability" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="availability">
                        <span>Availability</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="availability" class="collapse show">
                        <ul class="tf-filter-group current-scrollbar mb_36">
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="availability" class="tf-check" id="inStock">
                                <label for="inStock" class="label"><span>In
                                        stock</span>&nbsp;<span>(14)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="availability" class="tf-check" id="outStock">
                                <label for="outStock" class="label"><span>Out of
                                        stock</span>&nbsp;<span>(2)</span></label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#price" data-bs-toggle="collapse" aria-expanded="true"
                        aria-controls="price">
                        <span>Price</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="price" class="collapse show">
                        <div class="widget-price filter-price">
                            <div class="price-val-range" id="price-value-range" data-min="0" data-max="500"></div>
                            <div class="box-title-price">
                                <span class="title-price">Price :</span>
                                <div class="caption-price">
                                    <div class="price-val" id="price-min-value" data-currency="$"></div>
                                    <span>-</span>
                                    <div class="price-val" id="price-max-value" data-currency="$"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#brand" data-bs-toggle="collapse" aria-expanded="true"
                        aria-controls="brand">
                        <span>Brand</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="brand" class="collapse show">
                        <ul class="tf-filter-group current-scrollbar mb_36">
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="brand" class="tf-check" id="Ecomus">
                                <label for="Ecomus" class="label"><span>Ecomus</span>&nbsp;<span>(8)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="brand" class="tf-check" id="M&H">
                                <label for="M&H" class="label"><span>M&H</span>&nbsp;<span>(8)</span></label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#color" data-bs-toggle="collapse" aria-expanded="true"
                        aria-controls="color">
                        <span>Color</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="color" class="collapse show">
                        <ul class="tf-filter-group filter-color current-scrollbar mb_36">
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_beige" id="Beige"
                                    value="Beige">
                                <label for="Beige" class="label"><span>Beige</span>&nbsp;<span>(3)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_dark" id="Black"
                                    value="Black">
                                <label for="Black" class="label"><span>Black</span>&nbsp;<span>(18)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_blue-2" id="Blue"
                                    value="Blue">
                                <label for="Blue" class="label"><span>Blue</span>&nbsp;<span>(3)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_brown" id="Brown"
                                    value="Brown">
                                <label for="Brown" class="label"><span>Brown</span>&nbsp;<span>(3)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_cream" id="Cream"
                                    value="Cream">
                                <label for="Cream" class="label"><span>Cream</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_dark-beige"
                                    id="Dark Beige" value="Dark Beige">
                                <label for="Dark Beige" class="label"><span>Dark
                                        Beige</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_dark-blue"
                                    id="Dark Blue" value="Dark Blue">
                                <label for="Dark Blue" class="label"><span>Dark
                                        Blue</span>&nbsp;<span>(3)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_dark-green"
                                    id="Dark Green" value="Dark Green">
                                <label for="Dark Green" class="label"><span>Dark
                                        Green</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_dark-grey"
                                    id="Dark Grey" value="Dark Grey">
                                <label for="Dark Grey" class="label"><span>Dark
                                        Grey</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_grey" id="Grey"
                                    value="Grey">
                                <label for="Grey" class="label"><span>Grey</span>&nbsp;<span>(2)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_light-blue"
                                    id="Light Blue" value="Light Blue">
                                <label for="Light Blue" class="label"><span>Light
                                        Blue</span>&nbsp;<span>(5)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_light-green"
                                    id="Light Green" value="Light Green">
                                <label for="Light Green" class="label"><span>Light
                                        Green</span>&nbsp;<span>(3)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_light-grey"
                                    id="Light Grey" value="Light Grey">
                                <label for="Light Grey" class="label"><span>Light
                                        Grey</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_light-pink"
                                    id="Light Pink" value="Light Pink">
                                <label for="Light Pink" class="label"><span>Light
                                        Pink</span>&nbsp;<span>(2)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_purple"
                                    id="Light Purple" value="Light Purple">
                                <label for="Light Purple" class="label"><span>Light
                                        Purple</span>&nbsp;<span>(2)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_light-yellow"
                                    id="Light Yellow" value="Light Yellow">
                                <label for="Light Yellow" class="label"><span>Light
                                        Yellow</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_orange" id="Orange"
                                    value="Orange">
                                <label for="Orange" class="label"><span>Orange</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_pink" id="Pink"
                                    value="Pink">
                                <label for="Pink" class="label"><span>Pink</span>&nbsp;<span>(2)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_taupe" id="Taupe"
                                    value="Taupe">
                                <label for="Taupe" class="label"><span>Taupe</span>&nbsp;<span>(1)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_white" id="White"
                                    value="White">
                                <label for="White" class="label"><span>White</span>&nbsp;<span>(14)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="color" class="tf-check-color bg_yellow" id="Yellow"
                                    value="Yellow">
                                <label for="Yellow" class="label"><span>Yellow</span>&nbsp;<span>(1)</span></label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#size" data-bs-toggle="collapse" aria-expanded="true"
                        aria-controls="size">
                        <span>Size</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="size" class="collapse show">
                        <ul class="tf-filter-group current-scrollbar">
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="size" class="tf-check tf-check-size" value="S"
                                    id="S">
                                <label for="S" class="label"><span>S</span>&nbsp;<span>(7)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="size" class="tf-check tf-check-size" value="M"
                                    id="M">
                                <label for="M" class="label"><span>M</span>&nbsp;<span>(8)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="size" class="tf-check tf-check-size" value="L"
                                    id="L">
                                <label for="L" class="label"><span>L</span>&nbsp;<span>(8)</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="size" class="tf-check tf-check-size" value="XL"
                                    id="XL">
                                <label for="XL" class="label"><span>XL</span>&nbsp;<span>(6)</span></label>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Filter -->

<!-- toolbarShopmb -->
<div class="offcanvas offcanvas-start canvas-mb toolbar-shop-mobile" id="toolbarShopmb">
    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
    <div class="mb-canvas-content">
        <div class="mb-body">
            <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                <li class="nav-mb-item">
                    <a href="shop-default.html" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="{{ asset('/') }}website/assets/images/shop/cate/cate1.jpg" alt="">
                        </div>
                        <span>Accessories</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.html" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="{{ asset('/') }}website/assets/images/shop/cate/cate2.jpg" alt="">
                        </div>
                        <span>Dog</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.html" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="{{ asset('/') }}website/assets/images/shop/cate/cate3.jpg" alt="">
                        </div>
                        <span>Grocery</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.html" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="{{ asset('/') }}website/assets/images/shop/cate/cate4.png" alt="">
                        </div>
                        <span>Handbag</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="#cate-menu-one" class="tf-category-link has-children collapsed mb-menu-link"
                        data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-menu-one">
                        <div class="image">
                            <img src="{{ asset('/') }}website/assets/images/shop/cate/cate5.jpg" alt="">
                        </div>
                        <span>Fashion</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="cate-menu-one" class="collapse list-cate">
                        <ul class="sub-nav-menu" id="cate-menu-navigation">
                            <li>
                                <a href="#cate-shop-one" class="tf-category-link has-children sub-nav-link collapsed"
                                    data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-shop-one">
                                    <div class="image">
                                        <img src="{{ asset('/') }}website/assets/images/shop/cate/cate6.jpg"
                                            alt="">
                                    </div>
                                    <span>Mens</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="cate-shop-one" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">
                                        <li>
                                            <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                                <div class="image">
                                                    <img src="{{ asset('/') }}website/assets/images/shop/cate/cate1.jpg"
                                                        alt="">
                                                </div>
                                                <span>Accessories</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                                <div class="image">
                                                    <img src="{{ asset('/') }}website/assets/images/shop/cate/cate8.jpg"
                                                        alt="">
                                                </div>
                                                <span>Shoes</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#cate-shop-two" class="tf-category-link has-children sub-nav-link collapsed"
                                    data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-shop-two">
                                    <div class="image">
                                        <img src="{{ asset('/') }}website/assets/images/shop/cate/cate9.jpg"
                                            alt="">
                                    </div>
                                    <span>Womens</span>
                                    <span class="btn-open-sub"></span>
                                </a>
                                <div id="cate-shop-two" class="collapse">
                                    <ul class="sub-nav-menu sub-menu-level-2">
                                        <li>
                                            <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                                <div class="image">
                                                    <img src="{{ asset('/') }}website/assets/images/shop/cate/cate4.png"
                                                        alt="">
                                                </div>
                                                <span>Handbag</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                                <div class="image">
                                                    <img src="{{ asset('/') }}website/assets/images/shop/cate/cate7.jpg"
                                                        alt="">
                                                </div>
                                                <span>Tee</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-mb-item">
                    <a href="#cate-menu-two" class="tf-category-link has-children collapsed mb-menu-link"
                        data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-menu-two">
                        <div class="image">
                            <img src="{{ asset('/') }}website/assets/images/shop/cate/cate6.jpg" alt="">
                        </div>
                        <span>Men</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="cate-menu-two" class="collapse list-cate">
                        <ul class="sub-nav-menu" id="cate-menu-navigation1">
                            <li>
                                <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                    <div class="image">
                                        <img src="{{ asset('/') }}website/assets/images/shop/cate/cate1.jpg"
                                            alt="">
                                    </div>
                                    <span>Accessories</span>
                                </a>
                            </li>
                            <li>
                                <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                    <div class="image">
                                        <img src="{{ asset('/') }}website/assets/images/shop/cate/cate8.jpg"
                                            alt="">
                                    </div>
                                    <span>Shoes</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.html" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="{{ asset('/') }}website/assets/images/shop/cate/cate7.jpg" alt="">
                        </div>
                        <span>Tee</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="shop-default.html" class="tf-category-link mb-menu-link">
                        <div class="image">
                            <img src="{{ asset('/') }}website/assets/images/shop/cate/cate8.jpg" alt="">
                        </div>
                        <span>Shoes</span>
                    </a>
                </li>
                <li class="nav-mb-item">
                    <a href="#cate-menu-three" class="tf-category-link has-children collapsed mb-menu-link"
                        data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-menu-three">
                        <div class="image">
                            <img src="{{ asset('/') }}website/assets/images/shop/cate/cate9.jpg" alt="">
                        </div>
                        <span>Women</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="cate-menu-three" class="collapse list-cate">
                        <ul class="sub-nav-menu" id="cate-menu-navigation2">
                            <li>
                                <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                    <div class="image">
                                        <img src="{{ asset('/') }}website/assets/images/shop/cate/cate4.png"
                                            alt="">
                                    </div>
                                    <span>Handbag</span>
                                </a>
                            </li>
                            <li>
                                <a href="shop-default.html" class="tf-category-link sub-nav-link">
                                    <div class="image">
                                        <img src="{{ asset('/') }}website/assets/images/shop/cate/cate7.jpg"
                                            alt="">
                                    </div>
                                    <span>Tee</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mb-bottom">
            <a href="shop-default.html" class="tf-btn fw-5 btn-line">View all collection<i
                    class="icon icon-arrow1-top-left"></i></a>
        </div>
    </div>
</div>
<!-- /toolbarShopmb -->

<!-- modal login -->
<div class="modal modalCentered fade form-sign-in modal-part-content" id="login">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <div class="demo-title">Log in</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="tf-login-form">
                <form class="" id="loginForm" action="{{ route('customer.login') }}" method="POST"
                    accept-charset="utf-8">
                    @csrf
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="text" name="login"
                            value="{{ old('login') }}" required>
                        <label class="tf-field-label" for="">Email or Phone *</label>
                    </div>
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="password" name="password"
                            required>
                        <label class="tf-field-label" for="">Password *</label>
                    </div>
                    @if ($errors->has('login'))
                        <div class="text-danger">{{ $errors->first('login') }}</div>
                    @endif
                    <div>
                        <a href="#forgotPassword" data-bs-toggle="modal" class="btn-link link">Forgot your
                            password?</a>
                    </div>
                    <div>
                        <button type="submit"
                            class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Login</span></button>
                    </div>

                    <!-- Google Sign In Button -->
                    <div class="mt-3">
                        <a href="{{ route('customer.google.login') }}"
                            class="tf-btn btn-outline-secondary animate-hover-btn radius-3 w-100 justify-content-center d-flex align-items-center gap-2 text-decoration-none"
                            style="background-color: #fff; border: 1px solid #dadce0; color: #3c4043;">
                            <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 48 48">
                                <path fill="#EA4335"
                                    d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z" />
                                <path fill="#4285F4"
                                    d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z" />
                                <path fill="#FBBC05"
                                    d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z" />
                                <path fill="#34A853"
                                    d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z" />
                            </svg>
                            <span>Continue with Google</span>
                        </a>
                    </div>

                    <div class="bottom">
                        <div class="w-100">
                            <button type="submit"
                                class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Continue
                                    as Guest</span></button>
                        </div>
                        <div class="w-100">
                            <a href="#register" data-bs-toggle="modal" class="btn-link fw-6 w-100 link">
                                New customer? Create your account
                                <i class="icon icon-arrow1-top-left"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--forget password section-->
<div class="modal modalCentered fade form-sign-in modal-part-content" id="forgotPassword">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <div class="demo-title">Reset your password</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="tf-login-form">
                <form class="">
                    <div>
                        <p>Sign up for early Sale access plus tailored new arrivals, trends and promotions. To opt
                            out, click unsubscribe in our emails</p>
                    </div>
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="email" name="">
                        <label class="tf-field-label" for="">Email *</label>
                    </div>
                    <div>
                        <a href="#login" data-bs-toggle="modal" class="btn-link link">Cancel</a>
                    </div>
                    <div class="bottom">
                        <div class="w-100">
                            <button type="submit"
                                class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Reset
                                    password</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Register Section-->
<div class="modal modalCentered fade form-sign-in modal-part-content" id="register">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <div class="demo-title">Register</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="tf-login-form">
                <form id="registerForm" action="{{ route('customer.registration') }}" method="POST">
                    @csrf
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="text" name="c_full_name"
                            value="{{ old('c_full_name') }}" required>
                        <label class="tf-field-label" for="">Full name *</label>
                    </div>
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="text" name="c_phone"
                            value="{{ old('c_phone') }}" required>
                        <label class="tf-field-label" for="">Phone *</label>
                    </div>
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="email" name="c_email"
                            value="{{ old('c_email') }}">
                        <label class="tf-field-label" for="">Email</label>
                    </div>
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="password" name="c_password"
                            required>
                        <label class="tf-field-label" for="">Password *</label>
                    </div>
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="password"
                            name="c_password_confirmation" required>
                        <label class="tf-field-label" for="">Confirm Password *</label>
                    </div>
                    <div class="bottom">
                        <div class="w-100">
                            <button type="submit"
                                class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Register</span></button>
                        </div>
                        <div class="w-100">
                            <a href="#login" data-bs-toggle="modal" class="btn-link fw-6 w-100 link">
                                Already have an account? Log in here
                                <i class="icon icon-arrow1-top-left"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Google Sign In Button -->
                    <div class="mt-3">
                        <a href="{{ route('customer.google.login') }}"
                            class="tf-btn btn-outline-secondary animate-hover-btn radius-3 w-100 justify-content-center d-flex align-items-center gap-2 text-decoration-none"
                            style="background-color: #fff; border: 1px solid #dadce0; color: #3c4043;">
                            <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 48 48">
                                <path fill="#EA4335"
                                    d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z" />
                                <path fill="#4285F4"
                                    d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z" />
                                <path fill="#FBBC05"
                                    d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z" />
                                <path fill="#34A853"
                                    d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z" />
                            </svg>
                            <span>Continue with Google</span>
                        </a>
                    </div>
                    <div class="mt-3">
                        <button type="submit"
                            class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Continue
                                As Guest</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /modal login register end -->

<!-- shoppingCart -->
<div class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header">
                <div class="title fw-5">Shopping cart</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="wrap">
                <div class="tf-mini-cart-wrap">
                    <div class="tf-mini-cart-main">
                        <div class="tf-mini-cart-sroll">
                            <div class="tf-mini-cart-items">
                                @php
                                    $cart = \Cart::content();
                                @endphp
                                @if ($cart->count() > 0)
                                    @foreach ($cart as $item)
                                        <div class="tf-mini-cart-item" data-key="{{ $item->rowId }}">
                                            <div class="tf-mini-cart-image">
                                                <a href="{{ route('shop.details', $item->options->product_slug) }}">
                                                    <img src="{{ asset($item->options->image_path) }}"
                                                        alt="{{ $item->name }}">
                                                </a>
                                            </div>
                                            <div class="tf-mini-cart-info">
                                                <a class="title link"
                                                    href="{{ route('shop.details', $item->options->product_slug) }}">{{ $item->name }}</a>
                                                <div class="meta-variant">{{ $item->options->color_name }},
                                                    {{ $item->options->size_name }}</div>
                                                <div class="price fw-6">&#2547;{{ $item->price }}</div>
                                                <div class="tf-mini-cart-btns">
                                                    <div class="wg-quantity small">
                                                        <span class="btn-quantity minus-btn">-</span>
                                                        <input type="text" name="number"
                                                            value="{{ $item->qty }}">
                                                        <span class="btn-quantity plus-btn">+</span>
                                                    </div>
                                                    <div class="tf-mini-cart-remove">Remove</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>Your cart is empty.</p>
                                @endif
                            </div>
                            {{-- <div class="tf-minicart-recommendations">
                                    <div class="tf-minicart-recommendations-heading">
                                        <div class="tf-minicart-recommendations-title">You may also like</div>
                                        <div class="sw-dots small style-2 cart-slide-pagination"></div>
                                    </div>
                                    <div dir="ltr" class="swiper tf-cart-slide">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="tf-minicart-recommendations-item">
                                                    <div class="tf-minicart-recommendations-item-image">
                                                        <a href="product-detail.html">
                                                            <img src="{{asset('/')}}website/assets/images/products/white-3.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tf-minicart-recommendations-item-infos flex-grow-1">
                                                        <a class="title" href="product-detail.html">Loose Fit
                                                            Sweatshirt</a>
                                                        <div class="price">$25.00</div>
                                                    </div>
                                                    <div class="tf-minicart-recommendations-item-quickview">
                                                        <div class="btn-show-quickview quickview hover-tooltip">
                                                            <span class="icon icon-view"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-minicart-recommendations-item">
                                                    <div class="tf-minicart-recommendations-item-image">
                                                        <a href="product-detail.html">
                                                            <img src="{{asset('/')}}website/assets/images/products/white-2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tf-minicart-recommendations-item-infos flex-grow-1">
                                                        <a class="title" href="product-detail.html">Loose Fit Hoodie</a>
                                                        <div class="price">$25.00</div>
                                                    </div>
                                                    <div class="tf-minicart-recommendations-item-quickview">
                                                        <div class="btn-show-quickview quickview hover-tooltip">
                                                            <span class="icon icon-view"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                        </div>
                    </div>
                    <div class="tf-mini-cart-bottom">
                        <div class="tf-mini-cart-bottom-wrap">
                            <div class="tf-cart-totals-discounts">
                                <div class="tf-cart-total">Subtotal</div>
                                <div class="tf-totals-total-value fw-6">&#2547; {{ \Cart::subtotal() }}</div>
                            </div>
                            <div class="tf-cart-tax">Taxes and <a href="#">shipping</a> calculated at checkout
                            </div>
                            <div class="tf-mini-cart-line"></div>
                            <div class="tf-cart-checkbox">
                                <div class="tf-checkbox-wrapp">
                                    <input class="" type="checkbox" id="CartDrawer-Form_agree"
                                        name="agree_checkbox">
                                    <div>
                                        <i class="icon-check"></i>
                                    </div>
                                </div>
                                <label for="CartDrawer-Form_agree">
                                    I agree with the
                                    <a href="#" title="Terms of Service">terms and conditions</a>
                                </label>
                            </div>
                            <div class="tf-mini-cart-view-checkout">
                                <a href="{{ route('cart.products') }}"
                                    class="tf-btn btn-outline radius-3 link w-100 justify-content-center">View
                                    cart</a>
                                <a href="checkout.html"
                                    class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Check
                                        out</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /shoppingCart -->

<!-- modal compare -->
<div class="offcanvas offcanvas-bottom canvas-compare" id="compare">
    <div class="canvas-wrapper">
        <header class="canvas-header">
            <div class="close-popup">
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </div>
        </header>
        <div class="canvas-body">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tf-compare-list">
                            <div class="tf-compare-head">
                                <div class="title">Compare Products</div>
                            </div>
                            <div class="tf-compare-offcanvas">
                                <div class="tf-compare-item">
                                    <div class="position-relative">
                                        <div class="icon">
                                            <i class="icon-close"></i>
                                        </div>
                                        <a href="product-detail.html">
                                            <img class="radius-3"
                                                src="{{ asset('/') }}website/assets/images/products/orange-1.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="tf-compare-item">
                                    <div class="position-relative">
                                        <div class="icon">
                                            <i class="icon-close"></i>
                                        </div>
                                        <a href="product-detail.html">
                                            <img class="radius-3"
                                                src="{{ asset('/') }}website/assets/images/products/pink-1.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-compare-buttons">
                                <div class="tf-compare-buttons-wrap">
                                    <a href="compare.html"
                                        class="tf-btn radius-3 btn-fill justify-content-center fw-6 fs-14 flex-grow-1 animate-hover-btn ">Compare</a>
                                    <div class="tf-compapre-button-clear-all link">
                                        Clear All
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal compare -->

<!-- modal quick_add -->
<div class="modal fade modalDemo popup-quickadd" id="quick_add">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="wrap">
                <div class="tf-product-info-item">
                    <div class="image">
                        <img src="{{ asset('/') }}website/assets/images/products/orange-1.jpg" alt="">
                    </div>
                    <div class="content">
                        <a href="product-detail.html">Ribbed Tank Top</a>
                        <div class="tf-product-info-price">
                            <!-- <div class="price-on-sale">$8.00</div>
                                <div class="compare-at-price">$10.00</div>
                                <div class="badges-on-sale"><span>20</span>% OFF</div> -->
                            <div class="price">$18.00</div>
                        </div>
                    </div>
                </div>
                <div class="tf-product-info-variant-picker mb_15">
                    <div class="variant-picker-item">
                        <div class="variant-picker-label">
                            Color: <span class="fw-6 variant-picker-label-value">Orange</span>
                        </div>
                        <div class="variant-picker-values">
                            <input id="values-orange" type="radio" name="color" checked>
                            <label class="hover-tooltip radius-60" for="values-orange" data-value="Orange">
                                <span class="btn-checkbox bg-color-orange"></span>
                                <span class="tooltip">Orange</span>
                            </label>
                            <input id="values-black" type="radio" name="color">
                            <label class=" hover-tooltip radius-60" for="values-black" data-value="Black">
                                <span class="btn-checkbox bg-color-black"></span>
                                <span class="tooltip">Black</span>
                            </label>
                            <input id="values-white" type="radio" name="color">
                            <label class="hover-tooltip radius-60" for="values-white" data-value="White">
                                <span class="btn-checkbox bg-color-white"></span>
                                <span class="tooltip">White</span>
                            </label>
                        </div>
                    </div>
                    <div class="variant-picker-item">
                        <div class="variant-picker-label">
                            Size: <span class="fw-6 variant-picker-label-value">S</span>
                        </div>
                        <div class="variant-picker-values">
                            <input type="radio" name="size" id="values-s" checked>
                            <label class="style-text" for="values-s" data-value="S">
                                <p>S</p>
                            </label>
                            <input type="radio" name="size" id="values-m">
                            <label class="style-text" for="values-m" data-value="M">
                                <p>M</p>
                            </label>
                            <input type="radio" name="size" id="values-l">
                            <label class="style-text" for="values-l" data-value="L">
                                <p>L</p>
                            </label>
                            <input type="radio" name="size" id="values-xl">
                            <label class="style-text" for="values-xl" data-value="XL">
                                <p>XL</p>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="tf-product-info-quantity mb_15">
                    <div class="quantity-title fw-6">Quantity</div>
                    <div class="wg-quantity">
                        <span class="btn-quantity minus-btn">-</span>
                        <input type="text" name="number" value="1">
                        <span class="btn-quantity plus-btn">+</span>
                    </div>
                </div>
                <div class="tf-product-info-buy-button">
                    <form class="">
                        <a href="javascript:void(0);"
                            class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart"><span>Add
                                to cart -&nbsp;</span><span class="tf-qty-price">$18.00</span></a>
                        <div class="tf-product-btn-wishlist btn-icon-action">
                            <i class="icon-heart"></i>
                            <i class="icon-delete"></i>
                        </div>
                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                            class="tf-product-btn-wishlist box-icon bg_white compare btn-icon-action">
                            <span class="icon icon-compare"></span>
                            <span class="icon icon-check"></span>
                        </a>
                        <div class="w-100">
                            <a href="#" class="btns-full">Buy with <img
                                    src="{{ asset('/') }}website/assets/images/payments/paypal.png"
                                    alt=""></a>
                            <a href="#" class="payment-more-option">More payment options</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal quick_add -->

<!-- modal quick_view -->
<div class="modal fade modalDemo popup-quickview" id="quick_view">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="wrap">
                <div class="tf-product-media-wrap">
                    <div dir="ltr" class="swiper tf-single-slide">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="item">
                                    <img src="{{ asset('/') }}website/assets/images/products/orange-1.jpg"
                                        alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item">
                                    <img src="{{ asset('/') }}website/assets/images/products/pink-1.jpg"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next button-style-arrow single-slide-prev"></div>
                        <div class="swiper-button-prev button-style-arrow single-slide-next"></div>
                    </div>
                </div>
                <div class="tf-product-info-wrap position-relative">
                    <div class="tf-product-info-list">
                        <div class="tf-product-info-title">
                            <h5><a class="link" href="product-detail.html">Ribbed Tank Top</a></h5>
                        </div>
                        <div class="tf-product-info-badges">
                            <div class="badges text-uppercase">Best seller</div>
                            <div class="product-status-content">
                                <i class="icon-lightning"></i>
                                <p class="fw-6">Selling fast! 48 people have this in their carts.</p>
                            </div>
                        </div>
                        <div class="tf-product-info-price">
                            <div class="price">$18.00</div>
                        </div>
                        <div class="tf-product-description">
                            <p>Nunc arcu faucibus a et lorem eu a mauris adipiscing conubia ac aptent ligula
                                facilisis a auctor habitant parturient a a.Interdum fermentum.</p>
                        </div>
                        <div class="tf-product-info-variant-picker">
                            <div class="variant-picker-item">
                                <div class="variant-picker-label">
                                    Color: <span class="fw-6 variant-picker-label-value">Orange</span>
                                </div>
                                <div class="variant-picker-values">
                                    <input id="values-orange-1" type="radio" name="color-1" checked>
                                    <label class="hover-tooltip radius-60" for="values-orange-1" data-value="Orange">
                                        <span class="btn-checkbox bg-color-orange"></span>
                                        <span class="tooltip">Orange</span>
                                    </label>
                                    <input id="values-black-1" type="radio" name="color-1">
                                    <label class=" hover-tooltip radius-60" for="values-black-1" data-value="Black">
                                        <span class="btn-checkbox bg-color-black"></span>
                                        <span class="tooltip">Black</span>
                                    </label>
                                    <input id="values-white-1" type="radio" name="color-1">
                                    <label class="hover-tooltip radius-60" for="values-white-1" data-value="White">
                                        <span class="btn-checkbox bg-color-white"></span>
                                        <span class="tooltip">White</span>
                                    </label>
                                </div>
                            </div>
                            <div class="variant-picker-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="variant-picker-label">
                                        Size: <span class="fw-6 variant-picker-label-value">S</span>
                                    </div>
                                    <div class="find-size btn-choose-size fw-6">Find your size</div>
                                </div>
                                <div class="variant-picker-values">
                                    <input type="radio" name="size-1" id="values-s-1" checked>
                                    <label class="style-text" for="values-s-1" data-value="S">
                                        <p>S</p>
                                    </label>
                                    <input type="radio" name="size-1" id="values-m-1">
                                    <label class="style-text" for="values-m-1" data-value="M">
                                        <p>M</p>
                                    </label>
                                    <input type="radio" name="size-1" id="values-l-1">
                                    <label class="style-text" for="values-l-1" data-value="L">
                                        <p>L</p>
                                    </label>
                                    <input type="radio" name="size-1" id="values-xl-1">
                                    <label class="style-text" for="values-xl-1" data-value="XL">
                                        <p>XL</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="tf-product-info-quantity">
                            <div class="quantity-title fw-6">Quantity</div>
                            <div class="wg-quantity">
                                <span class="btn-quantity minus-btn">-</span>
                                <input type="text" name="number" value="1">
                                <span class="btn-quantity plus-btn">+</span>
                            </div>
                        </div>
                        <div class="tf-product-info-buy-button">
                            <form class="">
                                <a href="javascript:void(0);"
                                    class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart"><span>Add
                                        to cart -&nbsp;</span><span class="tf-qty-price">$8.00</span></a>
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
                                <div class="w-100">
                                    <a href="#" class="btns-full">Buy with <img
                                            src="{{ asset('/') }}website/assets/images/payments/paypal.png"
                                            alt=""></a>
                                    <a href="#" class="payment-more-option">More payment options</a>
                                </div>
                            </form>
                        </div>
                        <div>
                            <a href="product-detail.html" class="tf-btn fw-6 btn-line">View full details<i
                                    class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal quick_view -->

<!-- modal find_size -->
<div class="modal fade modalDemo tf-product-modal popup-findsize" id="find_size">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <div class="demo-title">Size chart</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="tf-rte">
                <div class="tf-table-res-df">
                    <h6>Size guide</h6>
                    <table class="tf-sizeguide-table">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th>US</th>
                                <th>Bust</th>
                                <th>Waist</th>
                                <th>Low Hip</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>XS</td>
                                <td>2</td>
                                <td>32</td>
                                <td>24 - 25</td>
                                <td>33 - 34</td>
                            </tr>
                            <tr>
                                <td>S</td>
                                <td>4</td>
                                <td>34 - 35</td>
                                <td>26 - 27</td>
                                <td>35 - 26</td>
                            </tr>
                            <tr>
                                <td>M</td>
                                <td>6</td>
                                <td>36 - 37</td>
                                <td>28 - 29</td>
                                <td>38 - 40</td>
                            </tr>
                            <tr>
                                <td>L</td>
                                <td>8</td>
                                <td>38 - 29</td>
                                <td>30 - 31</td>
                                <td>42 - 44</td>
                            </tr>
                            <tr>
                                <td>XL</td>
                                <td>10</td>
                                <td>40 - 41</td>
                                <td>32 - 33</td>
                                <td>45 - 47</td>
                            </tr>
                            <tr>
                                <td>XXL</td>
                                <td>12</td>
                                <td>42 - 43</td>
                                <td>34 - 35</td>
                                <td>48 - 50</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tf-page-size-chart-content">
                    <div>
                        <h6>Measuring Tips</h6>
                        <div class="title">Bust</div>
                        <p>Measure around the fullest part of your bust.</p>
                        <div class="title">Waist</div>
                        <p>Measure around the narrowest part of your torso.</p>
                        <div class="title">Low Hip</div>
                        <p class="mb-0">With your feet together measure around the fullest part of your hips/rear.
                        </p>
                    </div>
                    <div>
                        <img class="sizechart lazyload"
                            data-src="{{ asset('/') }}website/assets/images/shop/products/size_chart2.jpg"
                            src="{{ asset('/') }}website/assets/images/shop/products/size_chart2.jpg"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal find_size -->
