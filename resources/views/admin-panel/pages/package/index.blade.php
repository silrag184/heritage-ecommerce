@extends('admin-panel.layout.app')

@section('title')
Manage Combo Packages
@endsection

@section('admin-content')
<div class="app-content main-content mt-0">
    <div class="side-app">

        <div class="main-container container-fluid">

            <!-- PAGE HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Combo Packages</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <a href="{{ route('combo-packages.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add New Package
                    </a>
                </div>
            </div>
            <!-- PAGE HEADER END -->

            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Combo Package List</h3>
                        </div>

                        <div class="card-body">

                            @if(session('message'))
                                <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <div class="table-responsive export-table">
                                <table id="file-datatable" class="table table-bordered text-nowrap border-bottom w-100">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>URL</th>
                                            <th>Meta Title</th>
                                            <th>Total Products</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($packages as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td><strong>{{ $item->name }}</strong></td>

                                                <td>{{ $item->slug }}</td>

                                                <td>{{ $item->url }}</td>

                                                <td>{{ $item->meta_title }}</td>

                                                <td>
                                                    <span class="badge bg-primary">
                                                        {{ $item->products_count }} Products
                                                    </span>
                                                </td>

                                                <td>{{ $item->created_at->format('d M Y') }}</td>

                                                <td>
                                                    <a href="{{ route('combo-packages.edit', $item->id) }}"
                                                       class="btn btn-sm btn-outline-info">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="{{ route('combo-packages.show', $item->id) }}"
                                                       class="btn btn-sm btn-outline-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <form action="{{ route('combo-packages.delete', $item->id) }}"
                                                          method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure to delete this package?')"
                                                            class="btn btn-sm btn-outline-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
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
