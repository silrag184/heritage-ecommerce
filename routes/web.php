<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Categorycontroller;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ColorsController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\AttributeValueController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Website\CustomerController;


//frontend routes
Route::get('/',[WebsiteController::class,'index'])->name('home');
Route::get('/shop-section',[WebsiteController::class,'shopSection'])->name('shop.section');
Route::get('/shop-section-details/{slug}',[WebsiteController::class,'shopDetails'])->name('shop.details');
Route::get('/about-us',[WebsiteController::class,'aboutUs'])->name('about.us');
Route::get('/contact-us',[WebsiteController::class,'contactUs'])->name('contact.us');

//shipping routes
Route::get('/get-shipping-regions', [WebsiteController::class, 'getShippingRegions'])->name('shipping.regions');
Route::get('/get-shipping-areas/{region}', [WebsiteController::class, 'getShippingAreas'])->name('shipping.areas');
Route::get('/get-shipping-cost/{areaId}', [WebsiteController::class, 'getShippingCost'])->name('shipping.cost');

//cart routes
Route::get('cart-product-list',[WebsiteController::class,'cartProducts'])->name('cart.products');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/get-cart', [CartController::class, 'getCart'])->name('cart.get');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('cart.remove');

//Customer Authentication Routes
Route::post('/customer/registration',[CustomerController::class,'saveCustomerInfo'])->name('customer.registration');
Route::post('/customer/login',[CustomerController::class,'customerLoginCheck'])->name('customer.login');
Route::get('/customer/google/login',[CustomerController::class,'googleLogin'])->name('customer.google.login');
Route::get('/customer/google/callback',[CustomerController::class,'googleCallback'])->name('customer.google.callback');

// Protected Customer Routes
Route::middleware(['customer'])->group(function () {
    Route::get('/customer/logout',[CustomerController::class,'logout'])->name('customer.logout');
    Route::get('/customer/dashboard',[CustomerController::class,'customerDashboard'])->name('customer.dashboard');
    Route::get('/customer/profile',[CustomerController::class,'customerProfile'])->name('customer.profile');
    Route::post('/customer/update-profile/{id}',[CustomerController::class,'customerUpdateProfile'])->name('customer.update-profile');
    Route::get('/customer/order',[CustomerController::class,'customerOrder'])->name('customer.order');
    Route::get('/customer/change-password',[CustomerController::class,'customerChangePassword'])->name('customer.change-password');
    Route::post('/customer/update-password/{id}',[CustomerController::class,'customerPasswordUpdate'])->name('customer.update-password');
    Route::get('/customer/wishlist/show',[CustomerController::class,'customerWishlist'])->name('customer.wishlist.show');
    Route::get('/customer/wishlist/{id}',[CustomerController::class,'wishlist'])->name('customer.wishlist');
    Route::get('/customer/delete/wishlist/{id}',[CustomerController::class,'deleteWishlist'])->name('customer.wishlist.delete');
});

//end frontend routes




//backend routes //protected by auth middleware //used for jetstream auth scaffolding
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //category routes
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/view', [CategoryController::class, 'view'])->name('view');
        Route::get('/add', [CategoryController::class, 'add'])->name('add');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });

    //Sub Category Routes
    Route::group(['prefix' => 'subCategory', 'as' => 'subCategory.'], function () {
        Route::get('/view', [SubCategoryController::class, 'subCategoryView'])->name('view');
        Route::get('/add', [SubCategoryController::class, 'subCategoryAdd'])->name('add');
        Route::post('/store', [SubCategoryController::class, 'subCategoryStore'])->name('store');
        Route::get('/edit/{id}', [SubCategoryController::class, 'subCategoryEdit'])->name('edit');
        Route::put('/update/{id}', [SubCategoryController::class, 'subCategoryUpdate'])->name('update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'subCategoryDelete'])->name('delete');
    });

    //Colors Routes
    Route::group(['prefix' => 'color', 'as' => 'color.'], function () {
        Route::get('/view',[ColorsController::class,'colorView'])->name('view');
        Route::get('/add',[ColorsController::class,'colorAdd'])->name('add');
        Route::post('/store',[ColorsController::class,'colorStore'])->name('store');
        Route::get('/edit/{id}',[ColorsController::class,'colorEdit'])->name('edit');
        Route::put('/update/{id}',[ColorsController::class,'colorUpdate'])->name('update');
        Route::get('/delete/{id}',[ColorsController::class,'colorDelete'])->name('delete');
    });

    //Size Routes
    Route::group(['prefix' => 'size', 'as' => 'size.'], function () {
        Route::get('/view', [SizeController::class, 'sizeView'])->name('view');
        Route::get('/add', [SizeController::class, 'sizeAdd'])->name('add');
        Route::post('/store', [SizeController::class, 'sizeStore'])->name('store');
        Route::get('/edit/{id}', [SizeController::class, 'sizeEdit'])->name('edit');
        Route::put('/update/{id}', [SizeController::class, 'sizeUpdate'])->name('update');
        Route::get('/delete/{id}', [SizeController::class, 'sizeDelete'])->name('delete');
    });


    //Brand Routes
    Route::resource('brands', BrandController::class);

    //Unit/Measurement Routes
    Route::resource('units', UnitController::class);

    //Attributes Routes
    Route::resource('attributes', AttributeController::class);
    Route::resource('attribute-values', AttributeValueController::class);

    //Tag/Labels Routes
    Route::resource('tags', TagController::class);


    //Product Routes
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/view', [ProductController::class, 'productView'])->name('view');
        Route::get('/get-subcategories-by-category', [ProductController::class, 'getSubcategoriesByCategory'])->name('get_subcategories_by_category');
        Route::post('/ajax/calculate-price', [ProductController::class, 'calculatePrice'])->name('ajax_calculate_price');

        Route::get('/add', [ProductController::class, 'productAdd'])->name('add');
        Route::post('/store', [ProductController::class, 'productStore'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'productEdit'])->name('edit');
        Route::put('/update/{id}', [ProductController::class, 'productUpdate'])->name('update');
        Route::delete('/delete/{id}', [ProductController::class, 'productDelete'])->name('delete');
    });

    //Shipping Area Routes
    Route::resource('shippingAreas', ShippingAreaController::class);

    //other backend routes can be added here in the future

});
