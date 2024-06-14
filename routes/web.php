<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/show', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login.show');

    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('dashboard');
});


Route::group(['prefix' => 'users'], function () {
    Route::get('index', [UsersController::class, 'index'])->name('users.index');
    Route::get('create', [UsersController::class, 'create'])->name('users.create');
    Route::post('store', [UsersController::class, 'store'])->name('users.store');
    Route::get('edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::get('destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});

Route::group(['prefix' => 'counter'], function () {
    Route::get('index', [CounterController::class, 'index'])->name('counter.index');
    Route::get('create', [CounterController::class, 'create'])->name('counter.create');
    Route::post('store', [CounterController::class, 'store'])->name('counter.store');
    Route::get('edit/{id}', [CounterController::class, 'edit'])->name('counter.edit');
    Route::post('update/{id}', [CounterController::class, 'update'])->name('counter.update');
    Route::get('destroy/{id}', [CounterController::class, 'destroy'])->name('counter.destroy');
});

Route::group(['prefix' => 'supplier'], function () {
    Route::get('index', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post('update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::get('destroy/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
});

Route::group(['prefix' => 'product'], function () {
    Route::get('index', [ProductController::class, 'index'])->name('product.index');
    Route::get('create', [ProductController::class, 'create'])->name('product.create');
    Route::post('store', [ProductController::class, 'store'])->name('product.store');
    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

Route::group(['prefix' => 'car'], function () {
    Route::get('index', [CarController::class, 'index'])->name('car.index');
    Route::get('create', [CarController::class, 'create'])->name('car.create');
    Route::post('store', [CarController::class, 'store'])->name('car.store');
    Route::get('edit/{id}', [CarController::class, 'edit'])->name('car.edit');
    Route::post('update/{id}', [CarController::class, 'update'])->name('car.update');
    Route::get('destroy/{id}', [CarController::class, 'destroy'])->name('car.destroy');
});

Route::group(['prefix' => 'process'], function () {
    Route::get('index', [ProcessController::class, 'index'])->name('process.index');
    Route::get('create', [ProcessController::class, 'create'])->name('process.create');
    Route::post('store', [ProcessController::class, 'store'])->name('process.store');
    Route::get('edit/{id}', [ProcessController::class, 'edit'])->name('process.edit');
    Route::post('update/{id}', [ProcessController::class, 'update'])->name('process.update');
    Route::get('destroy/{id}', [ProcessController::class, 'destroy'])->name('process.destroy');
});

Route::group(['prefix' => 'client'], function () {
    Route::get('index', [ClientController::class, 'index'])->name('client.index');
    Route::get('create', [ClientController::class, 'create'])->name('client.create');
    Route::post('store', [ClientController::class, 'store'])->name('client.store');
    Route::get('edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
    Route::post('update/{id}', [ClientController::class, 'update'])->name('client.update');
    Route::get('destroy/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
});
