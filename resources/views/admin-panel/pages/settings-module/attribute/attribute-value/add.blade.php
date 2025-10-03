@extends('admin-panel.layout.app')

@section('title')
Add Attribute Value
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
                        <h1 class="page-title">Attribute Value Form</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Add Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Attribute Value</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Attribute Value</h4>
                                <a href="{{ route('attribute-values.index') }}" class="btn btn-secondary ms-auto d-block">Back to List</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('attribute-values.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="attribute_id" class="form-label">Attribute Name <span class="text-danger">*</span></label>
                                                <select class="form-control @error('attribute_id') is-invalid @enderror" id="attribute_id" name="attribute_id" required>
                                                    <option value="">Select Attribute</option>
                                                    @foreach ($attributes as $attribute)
                                                        <option value="{{ $attribute->id }}" {{ old('attribute_id') == $attribute->id ? 'selected' : '' }}>{{ $attribute->attribute_name }}</option>    
                                                    @endforeach
                                                </select>
                                                @error('attribute_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                    
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="value" class="form-label">Attribute Value<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('value') is-invalid @enderror" id="value" name="value" value="{{ old('value') }}" required>
                                                @error('value')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Publish</option>
                                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Unpublish</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Create Value</button>
                                            <a href="{{ route('attribute-values.index') }}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
