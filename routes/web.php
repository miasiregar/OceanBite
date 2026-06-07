<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| OceanBite Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);

Route::get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| USER DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [MenuController::class, 'dashboard']);

/*
|--------------------------------------------------------------------------
| MENU USER
|--------------------------------------------------------------------------
*/
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/menu/{id}', [MenuController::class, 'detail']);

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/
Route::post('/cart/add/{id}', [CartController::class, 'add']);
Route::get('/cart/increase/{id}', [CartController::class, 'increase']);
Route::get('/cart/decrease/{id}', [CartController::class, 'decrease']);
Route::get('/cart/remove/{id}', [CartController::class, 'remove']);

/*
|--------------------------------------------------------------------------
| CHECKOUT
|--------------------------------------------------------------------------
*/
Route::get('/checkout', [OrderController::class, 'checkout']);

/*
|--------------------------------------------------------------------------
| PAYMENT
|--------------------------------------------------------------------------
*/
Route::get('/payment', [OrderController::class, 'payment']);
Route::post('/payment/process', [OrderController::class, 'process']);

/*
|--------------------------------------------------------------------------
| INVOICE
|--------------------------------------------------------------------------
*/
Route::get('/invoice/{id}', [OrderController::class, 'invoice']);

/*
|--------------------------------------------------------------------------
| USER ORDERS
|--------------------------------------------------------------------------
*/
Route::get('/orders', [OrderController::class, 'index']);

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/admin', [AdminController::class, 'index']);

/*
|--------------------------------------------------------------------------
| ADMIN USERS
|--------------------------------------------------------------------------
*/
Route::get('/admin/users', [AdminController::class, 'users']);

/*
|--------------------------------------------------------------------------
| ADMIN MENU
|--------------------------------------------------------------------------
*/
Route::get('/admin/menu', [AdminController::class, 'menu']);

/* Create Menu */
Route::get('/admin/menu/create', [AdminController::class, 'createMenu']);
Route::post('/admin/menu/store', [AdminController::class, 'storeMenu']);

/* Edit Menu */
Route::get('/admin/menu/edit/{id}', [AdminController::class, 'editMenu']);
Route::post('/admin/menu/update/{id}', [AdminController::class, 'updateMenu']);

/* Delete Menu */
Route::get('/admin/menu/delete/{id}', [AdminController::class, 'deleteMenu']);

/*
|--------------------------------------------------------------------------
| ADMIN ORDERS
|--------------------------------------------------------------------------
*/
Route::get('/admin/orders', [AdminController::class, 'orders']);

/* Confirm Order */
Route::get('/admin/orders/confirm/{id}', [AdminController::class, 'confirmOrder']);