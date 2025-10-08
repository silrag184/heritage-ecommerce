@if($layout === 'list')
    @foreach ($products as $product)
    <div class="card-product list-layout" data-availability="{{ $product->stocks > 0 ? 'In stock' : 'Out of stock' }}" data-brand="{{ $product->brand->name ?? '' }}">
        <div class="card-product-wrapper">
            <a href="{{ url('product-detail/'.$product->slug) }}" class="product-img">
                @php
                    $defaultImage = $product->colorImages->first() ? asset($product->colorImages->first()->image_path) : asset('website/assets/images/products/default.jpg');
                    $hoverImage = $product->colorImages->count() > 1 ? asset($product->colorImages->skip(1)->first()->image_path) : $defaultImage;
                @endphp
                <img class="lazyload img-product main-img" data-src="{{ $defaultImage }}"
                    src="{{ $defaultImage }}" alt="{{ $product->product_name }}">
                <img class="lazyload img-hover hover-img" data-src="{{ $hoverImage }}"
                    src="{{ $hoverImage }}" alt="{{ $product->product_name }}">
            </a>
        </div>
        <div class="card-product-info">
            <a href="{{ url('product-detail/'.$product->slug) }}" class="title link">{{ $product->product_name }}</a>
            <span class="price current-price">&#2547;{{ number_format($product->selling_price ?? $product->regular_price, 2) }}</span>
            <p class="description">{{ $product->short_description ?? '' }}</p>
            @if ($product->colorImages && $product->colorImages->count() > 0)
            <ul class="list-color-product">
                @foreach ($product->colorImages as $index => $colorImage)
                <li class="list-color-item hover-tooltip color-swatch {{ $index == 0 ? 'active' : '' }}" data-image="{{ asset($colorImage->image_path) }}">
                    <span class="tooltip tooltip-bottom">{{ $colorImage->color_name ?? 'Color' }}</span>
                    <span class="swatch-value" style="background-color: {{ $colorImage->color_code ?? '#ccc' }}"></span>
                    <img class="lazyload" data-src="{{ asset($colorImage->image_path) }}"
                        src="{{ asset($colorImage->image_path) }}" alt="{{ $product->product_name }}">
                </li>
                @endforeach
            </ul>
            @endif
            @if ($product->sizes && $product->sizes->count() > 0)
            <div class="size-list">
                @foreach ($product->sizes as $size)
                <span class="size-item">{{ $size->size_name ?? $size->name }}</span>
                @endforeach
            </div>
            @endif
            <div class="list-product-btn">
                <a href="#quick_add" data-bs-toggle="modal"
                    class="box-icon quick-add style-3 hover-tooltip"><span
                        class="icon icon-bag"></span><span class="tooltip">Quick add</span></a>
                <a href="#" class="box-icon wishlist style-3 hover-tooltip"><span
                        class="icon icon-heart"></span> <span class="tooltip">Add to
                        Wishlist</span></a>
                <a href="#compare" data-bs-toggle="offcanvas"
                    class="box-icon compare style-3 hover-tooltip"><span
                        class="icon icon-compare"></span> <span class="tooltip">Add to
                        Compare</span></a>
                <a href="#quick_view" data-bs-toggle="modal"
                    class="box-icon quickview style-3 hover-tooltip"><span
                        class="icon icon-view"></span><span class="tooltip">Quick view</span></a>
            </div>
        </div>
    </div>
    @endforeach
@else
    @foreach ($products as $product)
    <div class="card-product grid" data-availability="{{ $product->stocks > 0 ? 'In stock' : 'Out of stock' }}" data-brand="{{ $product->brand->name ?? '' }}">
        <div class="card-product-wrapper">
            <a href="{{ url('product-detail/'.$product->slug) }}" class="product-img">
                @php
                    $defaultImage = $product->colorImages->first() ? asset($product->colorImages->first()->image_path) : asset('website/assets/images/products/default.jpg');
                    $hoverImage = $product->colorImages->count() > 1 ? asset($product->colorImages->skip(1)->first()->image_path) : $defaultImage;
                @endphp
                <img class="lazyload img-product main-img" data-src="{{ $defaultImage }}"
                    src="{{ $defaultImage }}" alt="{{ $product->product_name }}">
                <img class="lazyload img-hover hover-img" data-src="{{ $hoverImage }}"
                    src="{{ $hoverImage }}" alt="{{ $product->product_name }}">
            </a>
            <div class="list-product-btn absolute-2">
                <a href="#quick_add" data-bs-toggle="modal"
                    class="box-icon bg_white quick-add tf-btn-loading">
                    <span class="icon icon-bag"></span>
                    <span class="tooltip">Quick Add</span>
                </a>
                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
            <a href="{{ url('product-detail/'.$product->slug) }}" class="title link">{{ $product->product_name }}</a>
            <span class="price current-price">&#2547;{{ number_format($product->selling_price ?? $product->regular_price, 2) }}</span>
            @if ($product->colorImages && $product->colorImages->count() > 0)
            <ul class="list-color-product">
                @foreach ($product->colorImages as $index => $colorImage)
                <li class="list-color-item color-swatch {{ $index == 0 ? 'active' : '' }}" data-image="{{ asset($colorImage->image_path) }}">
                    <span class="tooltip">{{ $colorImage->color_name ?? 'Color' }}</span>
                    <span class="swatch-value" style="background-color: {{ $colorImage->color_code ?? '#ccc' }}"></span>
                    <img class="lazyload" data-src="{{ asset($colorImage->image_path) }}"
                        src="{{ asset($colorImage->image_path) }}" alt="{{ $product->product_name }}">
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    @endforeach
@endif
