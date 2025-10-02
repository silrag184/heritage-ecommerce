<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Categorycontroller;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ColorsController;
use App\Http\Controllers\Backend\SizeController;


//frontend routes
Route::get('/',[WebsiteController::class,'index'])->name('home');
Route::get('/shop-section',[WebsiteController::class,'shopSection'])->name('shop.section');
Route::get('/about-us',[WebsiteController::class,'aboutUs'])->name('about.us');

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
    
    //other backend routes can be added here in the future

});
