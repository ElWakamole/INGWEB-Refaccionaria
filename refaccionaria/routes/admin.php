<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TypeController;

Route::prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class,'getDashboard']);
    Route::get('/users', [UserController::class,'getUsers']);
    //Modulos Products
    Route::get('/products', [ProductController::class,'getHome']);
    Route::get('/products/add', [ProductController::class,'getProductAdd']);
    //Tipos
    Route::get('/types/{module}',[TypeController::class,'getHome']);
    Route::post('/types/add', [TypeController::class,'postTypeAdd']);
    Route::get('/types/{id}/edit',[TypeController::class,'getTypeEdit']);
    Route::post('/types/{id}/edit',[TypeController::class,'postTypeEdit']);
    Route::get('/types/{id}/delete',[TypeController::class,'getTypeDelete']);
});