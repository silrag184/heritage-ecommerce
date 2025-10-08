@extends('admin-panel.layout.app')

@section('title')
Manage Products
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
                        <h1 class="page-title">Product</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Product Table</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Products</h3>
                                <a href="{{ route('product.add') }}" class="btn btn-primary ms-auto d-block">Add Product</a>
                            </div>
                            <div class="card-body">
                                @if(session('message'))
                                    <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                                        {{ session('message') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                <div class="table-responsive export-table">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">SL.</th>
                                                <th class="border-bottom-0">Product Name</th>
                                                <th class="border-bottom-0">SKU</th>
                                                <th class="border-bottom-0">Slug</th>
                                                <th class="border-bottom-0">Product Price</th>
                                                <th class="border-bottom-0">Quantity</th>
                                                <th class="border-bottom-0">Product Image</th>
                                                <th class="border-bottom-0">Short Description</th>
                                                
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">Created At</th>
                                                <th class="border-bottom-0">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->sku }}</td>
                                                    <td>{{ $product->slug }}</td>
                                                    <td>{{ $product->selling_price }}</td>
                                                    <td>{{ $product->stocks }}</td>
                                                    <td>
                                                        @if($product->colorImages->count() > 0)
                                                            <img src="{{ asset($product->colorImages->first()->image_path) }}" alt="Product Image" style="width: 50px; height: 50px;">
                                                        @else
                                                            <img src="" alt="No Image" style="width: 50px; height: 50px;">
                                                        @endif
                                                    </td>
                                                    <td>{{ Str::limit($product->short_description, 50) }}</td>
                                                    <td>
                                                        @if($product->status == 1)
                                                            <span class="badge bg-success">Published</span>
                                                        @else
                                                            <span class="badge bg-danger">Unpublished</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                        <form action="{{ route('product.delete', $product->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Data?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
