@extends('website.layout.app')

@section('title')
Shop
@endsection

@section('content')
<!-- page-title -->
<div class="tf-page-title">
    <div class="container-full">
        <div class="heading text-center">All Available Products</div>
        <p class="text-center text-2 text_black-2 mt_5">Shop through our latest selection of Fashion</p>
    </div>
</div>
<!-- /page-title -->
<!-- Section Product -->
<section class="flat-spacing-2">
    <div class="container">
        <div class="tf-shop-control grid-3 align-items-center">
            <div class="tf-control-filter">
                <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                    class="tf-btn-filter"><span class="icon icon-filter"></span><span
                        class="text">Filter</span></a>
            </div>
            <ul class="tf-control-layout d-flex justify-content-center">
                <li class="tf-view-layout-switch sw-layout-list list-layout" data-value-layout="list">
                    <div class="item"><span class="icon icon-list"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                    <div class="item"><span class="icon icon-grid-2"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-3" data-value-layout="tf-col-3">
                    <div class="item"><span class="icon icon-grid-3"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-4 active" data-value-layout="tf-col-4">
                    <div class="item"><span class="icon icon-grid-4"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-5" data-value-layout="tf-col-5">
                    <div class="item"><span class="icon icon-grid-5"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-6" data-value-layout="tf-col-6">
                    <div class="item"><span class="icon icon-grid-6"></span></div>
                </li>
            </ul>
            <div class="tf-control-sorting d-flex justify-content-end">
                <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                    <div class="btn-select">
                        <span class="text-sort-value">Featured</span>
                        <span class="icon icon-arrow-down"></span>
                    </div>
                    <div class="dropdown-menu">
                        <div class="select-item active" data-sort-value="featured">
                            <span class="text-value-item">Featured</span>
                        </div>
                        <div class="select-item" data-sort-value="best_selling">
                            <span class="text-value-item">Best selling</span>
                        </div>
                        <div class="select-item" data-sort-value="a-z">
                            <span class="text-value-item">Alphabetically, A-Z</span>
                        </div>
                        <div class="select-item" data-sort-value="z-a">
                            <span class="text-value-item">Alphabetically, Z-A</span>
                        </div>
                        <div class="select-item" data-sort-value="price-low-high">
                            <span class="text-value-item">Price, low to high</span>
                        </div>
                        <div class="select-item" data-sort-value="price-high-low">
                            <span class="text-value-item">Price, high to low</span>
                        </div>
                        <div class="select-item" data-sort-value="date-old-new">
                            <span class="text-value-item">Date, old to new</span>
                        </div>
                        <div class="select-item" data-sort-value="date-new-old">
                            <span class="text-value-item">Date, new to old</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper-control-shop">
            <div class="meta-filter-shop">
                <div id="product-count-grid" class="count-text"></div>
                <div id="product-count-list" class="count-text"></div>
                <div id="applied-filters"></div>
                <button id="remove-all" class="remove-all-filters" style="display: none;">Remove All <i
                        class="icon icon-close"></i></button>
            </div>
            <div class="tf-list-layout wrapper-shop" id="listLayout">
                @include('website.pages.shop.partials.products', ['products' => $products, 'layout' => 'list'])
                @include('website.pages.shop.partials.pagination', ['products' => $products, 'layout' => 'list'])
            </div>
            <div class="tf-grid-layout wrapper-shop tf-col-4" id="gridLayout" style="display:none;">
                @include('website.pages.shop.partials.products', ['products' => $products, 'layout' => 'grid'])
                @include('website.pages.shop.partials.pagination', ['products' => $products, 'layout' => 'grid'])
            </div>

        </div>
    </div>
</section>
<!-- /Section Product -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const colorSwatches = document.querySelectorAll('.list-color-item');

    colorSwatches.forEach(swatch => {
        swatch.addEventListener('mouseenter', function() {
            const newImage = this.getAttribute('data-image');
            const productCard = this.closest('.card-product');
            const mainImg = productCard.querySelector('.main-img');
            const hoverImg = productCard.querySelector('.hover-img');
            if (mainImg && hoverImg) {
                mainImg.src = newImage;
                hoverImg.src = newImage;
            }
        });
    });

    //ei section tao baad jabe.. jodi backup file implement kora hoy............................
    // AJAX pagination
    function fetchProducts(url, layout) {
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (layout === 'list') {
                document.querySelector('#listLayout').innerHTML = data.products_html + data.pagination_html;
            } else {
                document.querySelector('#gridLayout').innerHTML = data.products_html + data.pagination_html;
            }
            attachPaginationLinks(layout);
        })
        .catch(error => console.error('Error fetching products:', error));
    }

    function attachPaginationLinks(layout) {
        const container = layout === 'list' ? document.querySelector('#listLayout') : document.querySelector('#gridLayout');
        container.querySelectorAll('.pagination-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                if (url) {
                    fetchProducts(url + '&layout=' + layout, layout);
                }
            });
        });
    }

    // Attach pagination links on initial load
    attachPaginationLinks('list');
    attachPaginationLinks('grid');
    //ei porjonto..................................
});
</script>

@endsection
