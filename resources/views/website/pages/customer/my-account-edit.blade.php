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
                                <li><a href="my-account.html" class="my-account-nav-item ">Dashboard</a></li>
                                <li><a href="my-account-orders.html" class="my-account-nav-item">Orders</a></li>
                                <li><a href="my-account-address.html" class="my-account-nav-item">Address</a></li>
                                <li><span class="my-account-nav-item active">Account Details</span></li>
                                <li><a href="my-account-wishlist.html" class="my-account-nav-item">Wishlist</a></li>
                                <li><a href="login.html" class="my-account-nav-item">Logout</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-9">
                        <div class="my-account-content account-edit">
                            <div class="">
                                <form class="" id="form-password-change" action="#">
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property1" name="">
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Full name</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="email" id="property2" name="">
                                        <label class="tf-field-label fw-4 text_black-2" for="property2">Email</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="number" id="property3" name="">
                                        <label class="tf-field-label fw-4 text_black-2" for="property3">Phone</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <select class="tf-field-input tf-input" id="property7" name="">
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <label class="tf-field-label fw-4 text_black-2" for="property7">Gender</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="date" id="property8" name="">
                                        <label class="tf-field-label fw-4 text_black-2" for="property8">Date of Birth</label>
                                    </div>
                                    <h6 class="mb_20">Profile Image Change</h6>
                                    <div class="tf-field style-1 mb_30">
                                        <div class="profile-image-preview mb_15">
                                            <img src="path/to/current/profile-image.jpg" alt="Current Profile Image" class="profile-image" style="max-width: 150px; max-height: 150px; border-radius: 50%;">
                                        </div>
                                        <input class="tf-field-input tf-input" type="file" id="property9" name="profile_image" accept="image/*">
                                        <label class="tf-field-label fw-4 text_black-2" for="property9">Upload New Profile Image</label>
                                    </div>
                                    <h6 class="mb_20">Password Change</h6>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder=" " type="password" id="property4" name="">
                                        <label class="tf-field-label fw-4 text_black-2" for="property4">Current password</label>
                                    </div>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder=" " type="password" id="property5" name="">
                                        <label class="tf-field-label fw-4 text_black-2" for="property5">New password</label>
                                    </div>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder=" " type="password" id="property6" name="">
                                        <label class="tf-field-label fw-4 text_black-2" for="property6">Confirm password</label>
                                    </div>
                                    <div class="mb_20">
                                        <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Save Changes</button>
                                    </div>
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