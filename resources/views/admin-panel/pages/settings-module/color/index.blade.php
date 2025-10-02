@extends('admin-panel.layout.app')

@section('title')
Manage Colors
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
                        <h1 class="page-title">Colors</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Colors Table</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Colors</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Colors</h3>
                                <a href="{{ route('color.add') }}" class="btn btn-primary ms-auto d-block">Add Color</a>
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
                                                <th class="border-bottom-0">Color Name</th>
                                                <th class="border-bottom-0">Color Code</th>
                                                <th class="border-bottom-0">Slug</th>
                                                <th class="border-bottom-0">Description</th>
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">Created At</th>
                                                <th class="border-bottom-0">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($colors as $color)
                                            
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $color->color_name }}</td>
                                                    <td>
                                                        <div style="width: 30px; height: 30px; background-color: {{ $color->color_code }}; border: 1px solid #ccc; display: inline-block;"></div>
                                                        {{ $color->color_code }}
                                                    </td>
                                                    <td>{{ $color->slug }}</td>
                                                    <td>{{ Str::limit($color->description, 50) }}</td>
                                                    <td>
                                                        @if($color->status == 1)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $color->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('color.edit', $color->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                        <form action="{{ route('color.delete', $color->id) }}" method="GET" style="display: inline;">
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
