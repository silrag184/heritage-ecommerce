@extends('admin-panel.layout.app')

@section('title')
Manage Shipping Areas
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
                        <h1 class="page-title">Shipping Areas</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Shipping Area Table</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shipping Areas</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Shipping Area</h3>
                                <a href="{{ route('shippingAreas.create') }}" class="btn btn-primary ms-auto d-block">Add Shipping Area</a>
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
                                                <th class="border-bottom-0">SL</th>
                                                <th class="border-bottom-0">Area Name</th>
                                                <th class="border-bottom-0">Region</th>
                                                <th class="border-bottom-0">Postal Code</th>
                                                <th class="border-bottom-0">Shipping Cost</th>
                                                <th class="border-bottom-0">Delivery Time</th>
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($shippingAreas as $shippingArea)
                                            
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $shippingArea->area_name }}</td>
                                                    <td>{{ $shippingArea->region }}</td>
                                                    <td>
                                                        {{ $shippingArea->postal_code }}
                                                    </td>
                                                    <td>{{ $shippingArea->shipping_cost }}</td>
                                                    <td>Estimately {{ $shippingArea->delivery_time }} Days </td>
                                                    <td>
                                                        @if($shippingArea->status == 1)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('shippingAreas.edit', $shippingArea->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                        <form action="{{ route('shippingAreas.destroy', $shippingArea->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this shipping area?')">Delete</button>
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
