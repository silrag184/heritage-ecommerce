@extends('admin-panel.layout.app')

@section('title')
Manage Units
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
                        <h1 class="page-title">Units</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Units Table</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Units</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Units</h3>
                                <a href="{{ route('units.create') }}" class="btn btn-primary ms-auto d-block">Add Unit</a>
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
                                                <th class="border-bottom-0">Unit Full Name</th>
                                                <th class="border-bottom-0">Unit Code</th>
                                                <th class="border-bottom-0">Slug</th>
                                                <th class="border-bottom-0">Description</th>
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">Created At</th>
                                                <th class="border-bottom-0">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($units as $unit)
                                            
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $unit->unit_name }}</td>
                                                    <td>
                                                        {{ $unit->unit_code }}
                                                    </td>
                                                    <td>{{ $unit->slug }}</td>
                                                    <td>{{ Str::limit($unit->description, 50) }}</td>
                                                    <td>
                                                        @if($unit->status == 1)
                                                            <span class="badge bg-success">Published</span>
                                                        @else
                                                            <span class="badge bg-danger">Unpublished</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $unit->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                        <form action="{{ route('units.destroy', $unit->id) }}" method="POST" style="display: inline;">
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
