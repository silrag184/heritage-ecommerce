@extends('admin-panel.layout.app')

@section('title', 'Create Combo Package')

@section('admin-content')
    <div class="app-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">

                <div class="page-header">
                    <h1 class="page-title">Add Combo Package</h1>
                    <ol class="breadcrumb ms-auto">
                        <li class="breadcrumb-item"><a href="{{ route('combo-packages.list') }}">Combo Packages</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Combo Package Details</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('combo-packages.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <!-- NAME -->
                                <div class="col-md-6 mb-3">
                                    <label>Package Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>

                                <!-- SLUG (READONLY) -->
                                <div class="col-md-6 mb-3">
                                    <label>Slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control" readonly>
                                    <small id="slug-status"></small>
                                </div>

                                <!-- URL (READONLY) -->
                                <div class="col-md-12 mb-3">
                                    <label>URL</label>
                                    <input type="text" id="url" name="url" class="form-control" readonly>
                                </div>
                            </div>

                            <hr>

                            <!-- SEO -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Meta Title <span class="text-danger">*</span></label>
                                    <input type="text" name="meta_title" class="form-control" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Meta Description <span class="text-danger">*</span></label>
                                    <input type="text" name="meta_description" class="form-control" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Meta Keywords <span class="text-danger">*</span></label>
                                    <input type="text" name="meta_keywords" class="form-control" required>
                                </div>
                            </div>

                            <hr>

                            <!-- PRODUCTS -->
                            <h4>Combo Products</h4>
                            <div class="col-md-12 mb-3">
                                <select name="product_id[]" class="col-12 form-control select2 " multiple>
                                    @foreach ($products as $p)
                                        <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary">Create Package</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function makeSlug(text) {
            return text.toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }

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
            if (slug.length < 2) return;

            $.ajax({
                url: "{{ route('combo-packages.checkSlug') }}",
                type: "GET",
                data: {
                    slug
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

        $(".product-select").on("change", function() {
            let selected = [];
            $(".product-select option:selected").each(function() {
                if (selected.includes($(this).val())) {
                    alert("This product is already selected!");
                    $(this).prop("selected", false);
                } else {
                    selected.push($(this).val());
                }
            });
        });
    </script>
@endsection
