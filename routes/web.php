<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DoctorController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.admin.dashboard');

    Route::get('/doctors', [DoctorController::class, 'index'])->name('backend.doctor.index');
    Route::get('/doctors/add', [DoctorController::class, 'create'])->name('backend.doctor.create');
    Route::get('/doctor/{id}', [DoctorController::class, 'show'])->name('backend.doctor.show');
    Route::post('/doctor/store', [DoctorController::class, 'store'])->name('backend.doctor.store');
    Route::get('/doctor/edit/{id}', [DoctorController::class, 'edit'])->name('backend.doctor.edit');
    Route::delete('/doctor/delete/{id}', [DoctorController::class, 'destroy'])->name('backend.doctor.delete');
    Route::post('/doctor/update/{id}', [DoctorController::class, 'update'])->name('backend.doctor.update');

    Route::get('/ecommerce-product-detail', [ProductController::class, 'show'])->name('backend.admin.product-detail');

    // supplier
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('backend.supplier.index');
    Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('backend.supplier.create');
    Route::post('/supplier/store', [SupplierController::class, 'store'])->name('backend.supplier.store');
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('backend.supplier.edit');
    Route::post('/supplier/update/{id}', [SupplierController::class, 'update'])->name('backend.supplier.update');
    Route::delete('/supplier/delete/{id}', [SupplierController::class, 'destroy'])->name('backend.supplier.delete');


});

