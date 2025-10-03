@extends('admin-panel.layout.app')

@section('title')
Edit Size
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
                        <h1 class="page-title">Size Form</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Edit Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Size</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Size</h4>
                                <a href="{{ route('size.view') }}" class="btn btn-secondary ms-auto d-block">Back to List</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('size.update', $size->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="sizeName" class="form-label">Size Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('size_name') is-invalid @enderror" id="sizeName" name="size_name" value="{{ old('size_name', $size->size_name) }}" required>
                                                @error('size_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="sizeCode" class="form-label">Size Code <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('size_code') is-invalid @enderror" id="sizeCode" name="size_code" value="{{ old('size_code', $size->size_code) }}" required>
                                                @error('size_code')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="slug" class="form-label">Slug</label>
                                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $size->slug) }}">
                                                @error('slug')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <small class="form-text text-muted">Leave blank to auto-generate from title.</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $size->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                                    <option value="1" {{ old('status', $size->status) == 1 ? 'selected' : '' }}>Publish</option>
                                                    <option value="0" {{ old('status', $size->status) == 0 ? 'selected' : '' }}>Unpublish</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Create Size</button>
                                            <a href="{{ route('size.view') }}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


<script>
    // Auto-generate slug from title
    document.getElementById('sizeName').addEventListener('input', function() {
        var sizeName = this.value;
        var slug = sizeName.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection
