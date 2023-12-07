<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TypeController;

Route::prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class,'getDashboard'])->name('dashboard');
    Route::get('/users/{status}', [UserController::class,'getUsers'])->name('user');
    Route::get('/users/{id}/edit', [UserController::class,'getUsersEdit'])->name('useredit');
    Route::post('/users/{id}/edit', [UserController::class,'postUsersEdit'])->name('useredit');
    Route::get('/users/{id}/permissions', [UserController::class,'getUsersPermissions'])->name('userpermissions');
    Route::post('/users/{id}/permissions', [UserController::class,'postUsersPermissions'])->name('userpermissions');
    //Modulos Products
    Route::get('/products', [ProductController::class,'getHome'])->name('products');
    Route::get('/products/add', [ProductController::class,'getProductAdd'])->name('productsadd');
    Route::get('/products/{id}/edit', [ProductController::class,'getProductEdit'])->name('productsedit');
    Route::post('/products/{id}/edit', [ProductController::class,'postProductEdit'])->name('productsedit');
    Route::post('/products/add', [ProductController::class,'postProductAdd'])->name('productsadd');
    Route::get('/products/{id}/delete', [ProductController::class,'getProductDelete'])->name('productsdelete');
    //Tipos
    Route::get('/types/{module}',[TypeController::class,'getHome'])->name('types');
    Route::post('/types/add', [TypeController::class,'postTypeAdd'])->name('typesadd');
    Route::get('/types/{id}/edit',[TypeController::class,'getTypeEdit'])->name('typesedit');
    Route::post('/types/{id}/edit',[TypeController::class,'postTypeEdit'])->name('typesedit');
    Route::get('/types/{id}/delete',[TypeController::class,'getTypeDelete'])->name('typesdelete');
});