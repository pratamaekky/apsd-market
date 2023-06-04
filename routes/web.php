<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::post('/submit-checkout', [HomeController::class, 'submitcheckout'])->name('submitcheckout');
Route::get('/detail/{id}', [HomeController::class, 'detail']);


Route::get('/cms/login', [UserController::class, 'login'])->name('login');
Route::post('/doLogin', [UserController::class, 'doLogin'])->name('doLogin');
Route::get('/cms/staff', [AdminController::class, 'staff']);
Route::prefix('cms')->middleware(['auth', 'isAdmin'])->group(function() {
    // Route::get('admin', [AdminController::class, 'index']);
    Route::get('/', [UserController::class, 'login']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/admin', [AdminController::class, 'index']);
});
