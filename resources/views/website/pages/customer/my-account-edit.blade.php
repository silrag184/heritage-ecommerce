@extends('website.layout.app')

@section('title')
Account Information Edit
@endsection

@section('content')
<!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Account Details</div>
            </div>
        </div>
        <!-- /page-title -->

        <!-- page-cart -->
        <section class="flat-spacing-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="wrap-sidebar-account">
                            <ul class="my-account-nav">
                                <li><a href="{{ route('customer.dashboard') }}" class="my-account-nav-item ">Dashboard</a></li>
                                <li><a href="{{ route('customer.orders') }}" class="my-account-nav-item">Orders</a></li>
                                <li><a href="{{ route('customer.address') }}" class="my-account-nav-item">Address</a></li>
                                <li><span class="my-account-nav-item active"><a href="{{ route('customer.profile') }}">Account Details</a></span></li>
                                <li><a href="{{ route('customer.wishlist.show') }}" class="my-account-nav-item">Wishlist</a></li>
                                <li><a href="{{ route('customer.logout') }}" class="my-account-nav-item">Logout</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-9">
                        <div class="my-account-content account-edit">
                            <div class="">
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="" id="form-profile-update" action="{{ route('customer.update-profile', Auth::guard('customer')->id()) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property1" name="c_full_name" value="{{ old('c_full_name', Auth::guard('customer')->user()->c_full_name ?? '') }}" required>
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Full name</label>
                                    </div>
                                    @if(Auth::guard('customer')->user()->c_email)
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="email" id="property2" name="c_email" value="{{ old('c_email', Auth::guard('customer')->user()->c_email ?? '') }}">
                                        <label class="tf-field-label fw-4 text_black-2" for="property2">Email</label>
                                    </div>
                                    @endif
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="number" id="property3" name="c_phone" value="{{ old('c_phone', Auth::guard('customer')->user()->c_phone ?? '') }}" required>
                                        <label class="tf-field-label fw-4 text_black-2" for="property3">Phone</label>
                                    </div>
                                    @if(Auth::guard('customer')->user()->gender)
                                    <div class="style-1 mb_15 select-custom w-100">
                                        <label class="tf-field-label fw-4 text_black-2" for="property7">Gender</label>
                                        <select class="tf-field-input tf-select w-100" id="property7" name="gender">
                                            <option value="" {{ !Auth::guard('customer')->user()->gender ? 'selected' : '' }}>Select Gender</option>
                                            <option value="male" {{ old('gender', Auth::guard('customer')->user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender', Auth::guard('customer')->user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="other" {{ old('gender', Auth::guard('customer')->user()->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    @endif
                                    @if(Auth::guard('customer')->user()->date_of_birth)
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="date" id="property8" name="date_of_birth" value="{{ old('date_of_birth', Auth::guard('customer')->user()->date_of_birth ? Auth::guard('customer')->user()->date_of_birth->format('Y-m-d') : '') }}">
                                        <label class="tf-field-label fw-4 text_black-2" for="property8">Date of Birth</label>
                                    </div>
                                    @endif
                                    <h6 class="mb_20">Profile Image Change</h6>
                                    <div class="tf-field style-1 mb_30">
                                        @if(Auth::guard('customer')->user()->c_image)
                                        <div class="profile-image-preview mb_15">
                                            <img src="{{ asset('uploads/images/customers/' . Auth::guard('customer')->user()->c_image) }}" alt="Current Profile Image" class="profile-image" style="max-width: 150px; max-height: 150px; border-radius: 50%;">
                                        </div>
                                        @endif
                                        <input class="tf-field-input tf-input" type="file" id="property9" name="profile_image" accept="image/*">
                                        <label class="tf-field-label fw-4 text_black-2" for="property9">Upload New Profile Image</label>
                                    </div>
                                    <h6 class="mb_20">Password Change</h6>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder=" " type="password" id="property4" name="current_password">
                                        <label class="tf-field-label fw-4 text_black-2" for="property4">Current password</label>
                                    </div>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder=" " type="password" id="property5" name="password">
                                        <label class="tf-field-label fw-4 text_black-2" for="property5">New password</label>
                                    </div>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder=" " type="password" id="property6" name="password_confirmation">
                                        <label class="tf-field-label fw-4 text_black-2" for="property6">Confirm password</label>
                                    </div>
                                    <div class="mb_20">
                                        <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Save Changes</button>
                                    </div>
                                </form>
                                <hr>
                                <h6 class="mb_20 text-danger">Danger Zone</h6>
                                <form action="{{ route('customer.delete-account') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="tf-btn w-100 radius-3 btn-outline-danger animate-hover-btn justify-content-center">Delete Account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-cart -->

        <div class="btn-sidebar-account">
            <button data-bs-toggle="offcanvas" data-bs-target="#mbAccount" aria-controls="offcanvas"><i
                    class="icon icon-sidebar-2"></i></button>
        </div>
@endsection
