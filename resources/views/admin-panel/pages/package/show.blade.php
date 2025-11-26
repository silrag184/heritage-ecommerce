@extends('admin-panel.layout.app')

@section('title')
    View Combo Package
@endsection

@section('admin-content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">

                <!-- Page Header -->
                <div class="page-header d-flex justify-content-between align-items-center mb-4">
                    <h1 class="page-title">Combo Package Details</h1>
                    <a href="{{ route('combo-packages.list') }}" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                </div>

                <!-- Package Info -->
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title mb-0">{{ $package->name }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-3 fw-bold">Slug:</div>
                                    <div class="col-md-9">{{ $package->slug }}</div>
                                </div>

                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-3 fw-bold">URL:</div>
                                    <div class="col-md-9 d-flex align-items-center">
                                        <input type="text" id="package-url" class="form-control form-control-sm me-2"
                                            value="{{ $package->url }}" readonly style="width: 100%; max-width:400px;">
                                        <button class="btn btn-outline-secondary btn-sm" id="copy-url-btn" title="Copy URL">
                                            <i class="fa fa-copy"></i> Copy
                                        </button>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 fw-bold">Meta Title:</div>
                                    <div class="col-md-9">{{ $package->meta_title }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 fw-bold">Meta Description:</div>
                                    <div class="col-md-9">{{ $package->meta_description }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 fw-bold">Meta Keywords:</div>
                                    <div class="col-md-9">{{ $package->meta_keywords }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-3">Products in this Combo</h4>
                        <div class="row">
                            @forelse ($package->products as $product)
                                @php
                                    $firstImage = $product->colorImages->first();
                                    $imagePath = $firstImage?->image_path ?? '/default-product.png';
                                @endphp
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card h-100 shadow-sm border-0">
                                        <a href="{{ route('shop.details', $product->slug) }}" target="_blank">
                                            <img src="{{ asset($imagePath) }}" class="card-img-top"
                                                alt="{{ $product->product_name }}" style="height:200px; object-fit:cover;">
                                        </a>
                                        <div class="card-body text-center">
                                            <h6 class="card-title mb-0">
                                                <a href="{{ route('shop.details', $product->slug) }}" target="_blank">
                                                    {{ $product->product_name }}
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p>No products found in this combo package.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Copy URL Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const copyBtn = document.getElementById('copy-url-btn');
            const urlInput = document.getElementById('package-url');

            copyBtn.addEventListener('click', function() {
                urlInput.select();
                urlInput.setSelectionRange(0, 99999); // For mobile devices
                navigator.clipboard.writeText(urlInput.value).then(function() {
                    alert("Package URL copied to clipboard: " + urlInput.value);
                }).catch(function(err) {
                    console.error('Could not copy text: ', err);
                });
            });
        });
    </script>
@endsection
