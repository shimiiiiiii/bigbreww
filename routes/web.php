<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\GateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminhomeController;
use App\Http\Controllers\OrderController;


use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/product',[ProductController::class, 'index'])->name('product.index');
Route::get('/product/create',[ProductController::class, 'create'])->name('product.create');
Route::post('/product/create',[ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product_id}/edit',[ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product_id}/edit',[ProductController::class, 'update'])->name('product.update');
Route::get('/product/{product_id}/delete',[ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/search', [ProductController::class, 'search'])->name('product.search');

Route::get('/adminhome', [AdminhomeController::class, 'index'])->name('admin.adminhome');
Route::get('/admin', [AdminhomeController::class, 'indexito'])->name('admin.adminlang');
Route::get('/admin/create',[AdminhomeController::class, 'create'])->name('admin.create');
Route::post('/admin/create',[AdminhomeController::class, 'store'])->name('admin.store');
Route::get('/admin/{id}/edit',[AdminhomeController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}/edit',[AdminhomeController::class, 'update'])->name('admin.update');
Route::get('/admin/{id}/delete',[AdminhomeController::class, 'destroy'])->name('admin.destroy');


Route::get('/inventory',[InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/create',[InventoryController::class, 'create'])->name('inventory.create');
Route::post('/inventory/create',[InventoryController::class, 'store'])->name('inventory.store');
Route::get('/inventory/{inventory_id}/edit',[InventoryController::class, 'edit'])->name('inventory.edit');
Route::put('/inventory/{inventory_id}/edit',[InventoryController::class, 'update'])->name('inventory.update');
Route::get('/inventory/{inventory_id}/delete',[InventoryController::class, 'destroy'])->name('inventory.destory');

Route::get('/expenses',[ExpensesController::class, 'index'])->name('expenses.index');
Route::get('/expenses/create',[ExpensesController::class, 'create'])->name('expenses.create');
Route::post('/expenses/create',[ExpensesController::class, 'store'])->name('expenses.store');
Route::get('/expenses/{expenses_id}/edit',[ExpensesController::class, 'edit'])->name('expenses.edit');
Route::put('/expenses/{expenses_id}/edit',[ExpensesController::class, 'update'])->name('expenses.update');
Route::get('/expenses/{expenses_id}/delete',[ExpensesController::class, 'destroy'])->name('expenses.destory');

Route::get('/customer',[CustomerController::class, 'index'])->name('customer.index');

Route::get('/cart',[CartController::class, 'index'])->name('cart.index');



Route::post('/cart/add', [HomeController::class, 'addToCart'])->name('cart.add');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/addtocart', [CartController::class, 'show'])->name('cart.show');;


Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
