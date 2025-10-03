@extends('admin-panel.layout.app')

@section('title')
Manage Attribute Values
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
                        <h1 class="page-title">Attribute Values</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Attribute Value Table</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Attribute Values</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Attribute Values</h3>
                                <a href="{{ route('attribute-values.create') }}" class="btn btn-primary ms-auto d-block">Add Attribute Value</a>
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
                                                <th class="border-bottom-0">Attribute Name</th>
                                                <th class="border-bottom-0">Values</th>
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">Created At</th>
                                                <th class="border-bottom-0">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($attributeValues as $attributeValue)
                                            
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $attributeValue->attribute ? $attributeValue->attribute->attribute_name : 'N/A' }}</td>
                                                    <td>{{ $attributeValue->value }}</td>
                                                    <td>
                                                        @if($attributeValue->status == 1)
                                                            <span class="badge bg-success">Published</span>
                                                        @else
                                                            <span class="badge bg-danger">Unpublished</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $attributeValue->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('attribute-values.edit', $attributeValue->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                        <form action="{{ route('attribute-values.destroy', $attributeValue->id) }}" method="POST" style="display: inline;">
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
