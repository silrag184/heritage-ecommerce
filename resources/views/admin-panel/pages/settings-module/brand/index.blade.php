@extends('admin-panel.layout.app')

@section('title')
Manage Brands
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
                        <h1 class="page-title">Brands</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Brands Table</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Brands</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Brands</h3>
                                <a href="{{ route('brands.create') }}" class="btn btn-primary ms-auto d-block">Add Brand</a>
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
                                                <th class="border-bottom-0">Brand Name</th>
                                                <th class="border-bottom-0">Slug</th>
                                                <th class="border-bottom-0">Description</th>
                                                <th class="border-bottom-0">Brand Logo</th>
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">Created At</th>
                                                <th class="border-bottom-0">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($brands as $brand)
                                            
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $brand->brand_name }}</td>
                                                    <td>{{ $brand->slug }}</td>
                                                    <td>{{ Str::limit($brand->description, 50) }}</td>
                                                    <td>
                                                        @if($brand->brand_logo)
                                                            <img src="{{ asset($brand->brand_logo) }}" alt="{{ $brand->brand_name }}" width="50" height="50">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($brand->status == 1)
                                                            <span class="badge bg-success">Publish</span>
                                                        @else
                                                            <span class="badge bg-danger">Unpublish</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $brand->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                        <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
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
        </dibv>
    </div>
@endsection
