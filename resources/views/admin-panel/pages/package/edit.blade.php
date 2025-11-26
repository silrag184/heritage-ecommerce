@extends('admin-panel.layout.app')

@section('title', 'Edit Combo Package')

@section('admin-content')
    <div class="app-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">

                <div class="page-header">
                    <h1 class="page-title">Edit Combo Package</h1>
                    <ol class="breadcrumb ms-auto">
                        <li class="breadcrumb-item"><a href="{{ route('combo-packages.list') }}">Combo Packages</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Combo Package Details</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('combo-packages.update', $package->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- NAME -->
                                <div class="col-md-6 mb-3">
                                    <label>Package Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ $package->name }}" required>
                                </div>

                                <!-- SLUG READONLY -->
                                <div class="col-md-6 mb-3">
                                    <label>Slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control"
                                        value="{{ $package->slug }}" readonly>
                                    <small id="slug-status"></small>
                                </div>

                                <!-- URL READONLY -->
                                <div class="col-md-12 mb-3">
                                    <label>URL</label>
                                    <input type="text" id="url" name="url" class="form-control"
                                        value="{{ $package->url }}" readonly>
                                </div>
                            </div>

                            <hr>

                            <!-- SEO -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ $package->meta_title }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Meta Description</label>
                                    <input type="text" name="meta_description" class="form-control"
                                        value="{{ $package->meta_description }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Meta Keywords</label>
                                    <input type="text" name="meta_keywords" class="form-control"
                                        value="{{ $package->meta_keywords }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Status <span class="text-danger">*</span></label>
                                    <select class="form-control" name="status">
                                        <option disabled selected>Select Status</option>
                                        <option value="1">Published</option>
                                        <option value="0">Unpublished</option>
                                    </select>
                                </div>
                            </div>


                            <hr>

                            <!-- PRODUCTS MULTI SELECT -->
                            <h4>Combo Products</h4>
                            <div class="mb-3">
                                <select name="product_id[]" class="form-control product-select" multiple size="10">
                                    @foreach ($products as $p)
                                        <option value="{{ $p->id }}"
                                            @if ($package->products->pluck('id')->contains($p->id)) selected @endif>
                                            {{ $p->product_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary">Update Package</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        function makeSlug(text) {
            return text.toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }

        // Auto update slug + URL from name
        $("#name").on("keyup change", function() {
            let slug = makeSlug($(this).val());
            $("#slug").val(slug);
            updateURL(slug);
            checkSlugUnique(slug);
        });

        function updateURL(slug) {
            let domain = "{{ url('/') }}";
            $("#url").val(domain + "/combo/" + slug);
        }

        function checkSlugUnique(slug) {
            $.ajax({
                url: "{{ route('combo-packages.checkSlug') }}",
                type: "GET",
                data: {
                    slug,
                    id: "{{ $package->id }}"
                },
                success: function(res) {
                    if (res.exists) {
                        $("#slug-status").html("<span class='text-danger'>❌ Slug already exists</span>");
                    } else {
                        $("#slug-status").html("<span class='text-success'>✔ Slug available</span>");
                    }
                }
            });
        }

        // Prevent duplicate selection
        $(".product-select").on("change", function() {
            let selected = [];

            $(".product-select option:selected").each(function() {
                let val = $(this).val();
                if (selected.includes(val)) {
                    alert("This product is already selected!");
                    $(this).prop("selected", false);
                } else {
                    selected.push(val);
                }
            });
        });
    </script>
@endsection
