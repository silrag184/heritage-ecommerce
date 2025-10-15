@extends('admin-panel.layout.app')

@section('title')
Edit Shipping Area
@endsection

@section('admin-content')

    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">


                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Shipping Area Form</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Edit Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Shipping Area</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Shipping Area</h4>
                                <a href="{{ route('shippingAreas.index') }}" class="btn btn-secondary ms-auto d-block">Back to List</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('shippingAreas.update', $shippingArea->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="areaName" class="form-label">Area Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('area_name') is-invalid @enderror" id="areaName" name="area_name" value="{{ old('area_name', $shippingArea->area_name) }}" required>
                                                @error('area_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="region" class="form-label">Region</label>
                                                <input type="text" class="form-control @error('region') is-invalid @enderror" id="region" name="region" value="{{ old('region', $shippingArea->region) }}">
                                                @error('region')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="postalCode" class="form-label">Postal Code</label>
                                                <input type="number" class="form-control @error('postal_code') is-invalid @enderror" id="postalCode" name="postal_code" value="{{ old('postal_code', $shippingArea->postal_code) }}">
                                                @error('postal_code')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="shippingCost" class="form-label">Shipping Cost</label>
                                                <input type="text" class="form-control @error('shipping_cost') is-invalid @enderror" id="shippingCost" name="shipping_cost" value="{{ old('shipping_cost', $shippingArea->shipping_cost) }}">
                                                @error('shipping_cost')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="deliveryTime" class="form-label">Delivery Time (Day)</label>
                                                <input type="text" class="form-control @error('delivery_time') is-invalid @enderror" id="deliveryTime" name="delivery_time" value="{{ old('delivery_time', $shippingArea->delivery_time) }}">
                                                @error('delivery_time')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                                    <option value="1" {{ old('status', $shippingArea->status) == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status', $shippingArea->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Update Shipping Area</button>
                                            <a href="{{ route('shippingAreas.index') }}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
