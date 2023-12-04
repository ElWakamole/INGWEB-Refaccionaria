<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class,'getDashboard']);
    Route::get('/users', [UserController::class,'getUsers']);
});