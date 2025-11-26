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

                                @if (session('message'))
                                    <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show">
                                        {{ session('message') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <div class="table-responsive export-table">
                                    <table id="file-datatable" class="table table-bordered text-nowrap border-bottom w-100">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">SL</th>
                                                <th class="border-bottom-0">Name</th>
                                                <th class="border-bottom-0">Slug</th>
                                                <th class="border-bottom-0">URL</th>
                                                <th class="border-bottom-0">Meta Title</th>
                                                <th class="border-bottom-0">Total Products</th>
                                                <th class="border-bottom-0">Date</th>
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($packages as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><strong>{{ $item->name }}</strong></td>
                                                    <td>{{ $item->slug }}</td>

                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <span id="url-{{ $item->id }}">{{ $item->url }}</span>
                                                            <button
                                                                class="btn btn-sm btn-outline-secondary ms-2 copy-url-btn"
                                                                data-url="{{ $item->url }}" title="Copy URL">
                                                                <i class="fa fa-copy"></i>
                                                            </button>
                                                        </div>
                                                    </td>

                                                    <td>{{ $item->meta_title }}</td>
                                                    <td>
                                                        <span class="badge bg-primary">
                                                            {{ $item->products->count() }} Products
                                                        </span>
                                                    </td>
                                                    <td>{{ $item->created_at->format('d M Y') }}</td>

                                                    <td>
                                                        @if($item->status == 1)
                                                            <span class="badge bg-success">Published</span>
                                                        @else
                                                            <span class="badge bg-danger">Unpublished</span>
                                                        @endif
                                                    </td>

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

    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Event delegation for dynamically generated rows
            $(document).on('click', '.copy-url-btn', function() {
                const url = $(this).data('url');

                // Use Clipboard API
                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(url).then(function() {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'URL copied to clipboard',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                        });
                    }).catch(function(err) {
                        console.error('Clipboard write failed', err);
                    });
                } else {
                    // fallback for older browsers
                    const $temp = $("<input>");
                    $("body").append($temp);
                    $temp.val(url).select();
                    document.execCommand("copy");
                    $temp.remove();

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'URL copied to clipboard',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                    });
                }
            });
        });
    </script>
@endsection
