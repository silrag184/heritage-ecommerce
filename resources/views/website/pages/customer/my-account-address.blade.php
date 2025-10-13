@extends('website.layout.app')

@section('title')
My Address
@endsection

@section('content')
<!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Address</div>
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
                                <li><span class="my-account-nav-item active">Address</span></li>
                                <li><a href="my-account-edit.html" class="my-account-nav-item">Account Details</a></li>
                                <li><a href="my-account-wishlist.html" class="my-account-nav-item">Wishlist</a></li>
                                <li><a href="login.html" class="my-account-nav-item">Logout</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-9">
                        <div class="my-account-content account-address">
                            <div class="text-center widget-inner-address">
                                <div class="list-account-address">
                                    <div class="account-address-item">
                                        <h6 class="mb_20">Current Address</h6>
                                        <p>themesflat</p>
                                        <p>1234 Fashion Street, Suite 567</p>
                                        <p>New York</p>
                                        <div class="d-flex gap-10 justify-content-center">
                                            <button
                                                class="tf-btn btn-fill animate-hover-btn justify-content-center btn-edit-address">
                                                <span>Edit</span>
                                            </button>
                                            <button class="tf-btn btn-outline animate-hover-btn justify-content-center">
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                        <form class="edit-form-address wd-form-address" id="formeditAddress" action="#">
                                            <div class="title">Edit address</div>
                                            <div class="box-field">
                                                <div class="tf-field style-1">
                                                    <input class="tf-field-input tf-input" placeholder=" " type="text"
                                                        id="addressEdit" name="address">
                                                    <label class="tf-field-label fw-4 text_black-2"
                                                        for="addressEdit">Address</label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center gap-20">
                                                <button type="button" class="tf-btn btn-fill animate-hover-btn">Update
                                                    address</button>
                                                <span
                                                    class="tf-btn btn-fill animate-hover-btn btn-hide-edit-address">Cancel</span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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