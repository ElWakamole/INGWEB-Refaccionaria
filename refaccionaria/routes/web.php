<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\UserController;
use Illuminate\Mail\Mailables\Content;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ContentController::class,'getHome'])->name('home');

//Router Auth
Route::get('/login',[ConnectController::class, 'getLogin'])->name('login');
Route::post('/login',[ConnectController::class, 'postLogin'])->name('login');
Route::get('/register',[ConnectController::class, 'getRegister'])->name('register');
Route::post('/register',[ConnectController::class,'postRegister'])->name('register');
Route::get('/logout',[ConnectController::class, 'getLogout'])->name('logout');

Route::get('/account',[UserController::class,'getAccount'])->name('account');