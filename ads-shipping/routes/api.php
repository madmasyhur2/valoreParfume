<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/province', [HomeController::class, 'getProvince'])->name('province');
Route::get('/regency/{province_id}', [HomeController::class, 'getRegency']);
Route::get('/district/{regency_id}', [HomeController::class, 'getDistrict']);
Route::get('/village/{district_id}', [HomeController::class, 'getVillage']);

Route::post('/shippings', [ShippingController::class, 'index']); 

Route::get('/shippings/admin', [AdminController::class, 'index'])->name('admin.shippings');
Route::get('/shippings/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/shippings/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/shippings/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
