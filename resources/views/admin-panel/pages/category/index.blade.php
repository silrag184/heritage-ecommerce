@extends('admin-panel.layout.app')

@section('title')
Manage Categories
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
                        <h1 class="page-title">Category</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Category Table</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categories</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Categories</h3>
                                <a href="{{ route('category.add') }}" class="btn btn-primary ms-auto d-block">Add Category</a>
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
                                                <th class="border-bottom-0">ID</th>
                                                <th class="border-bottom-0">Title</th>
                                                <th class="border-bottom-0">Slug</th>
                                                <th class="border-bottom-0">Description</th>
                                                <th class="border-bottom-0">Image</th>
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">Created At</th>
                                                <th class="border-bottom-0">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                            
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->title }}</td>
                                                    <td>{{ $category->slug }}</td>
                                                    <td>{{ Str::limit($category->description, 50) }}</td>
                                                    <td>
                                                        @if($category->image)
                                                            <img src="{{ asset($category->image) }}" alt="{{ $category->title }}" width="50" height="50">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($category->status == 1)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $category->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                        <form action="{{ route('category.delete', $category->id) }}" method="GET" style="display: inline;">
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
