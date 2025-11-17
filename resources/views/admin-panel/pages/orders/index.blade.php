@extends('admin-panel.layout.app')

@section('title')
Manage Orders
@endsection

@section('admin-content')
<div class="app-content main-content mt-0">
    <div class="side-app">

        <div class="main-container container-fluid">

            <!-- PAGE HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Orders</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Order Table</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE HEADER END -->

            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Order List</h3>
                        </div>

                        <div class="card-body">

                            @if(session('message'))
                                <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <div class="table-responsive export-table">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Order Number</th>
                                            <th>Customer Info</th>
                                            <th>Shipping Region</th>
                                            <th>Total Amount</th>
                                            <th>Payment Method</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td><strong>{{ $order->order_number }}</strong></td>

                                                <td>{{ $order->full_name }} <br> {{ $order->phone }}</td>

                                                <td>{{ $order->shipping_region }}</td>
                                                <td>
                                                    {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}
                                                </td>
                                                <td><strong>{{ number_format($order->total, 2) }} BDT</strong></td>

                                                <td>
                                                    <span class="badge
                                                        @if($order->payment_status == 'paid') bg-success
                                                        @elseif($order->payment_status == 'pending') bg-warning
                                                        @else bg-danger @endif">
                                                        {{ ucfirst($order->payment_status) }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <span class="badge
                                                        @if($order->status == 'pending') bg-warning
                                                        @elseif($order->status == 'processing') bg-primary
                                                        @elseif($order->status == 'shipped') bg-info
                                                        @elseif($order->status == 'delivered') bg-success
                                                        @else bg-danger @endif
                                                    ">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </td>



                                                <td>{{ $order->created_at->format('d M Y') }}</td>

                                                <td>
                                                    <a href="{{ route('orders.view', $order->id) }}"
                                                       class="btn btn-sm btn-outline-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <form action="{{ route('orders.delete', $order->id) }}"
                                                          method="POST"
                                                          style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure to delete this order?')"
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
