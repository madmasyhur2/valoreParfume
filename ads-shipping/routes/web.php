<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::get('/province', [HomeController::class, 'getProvince'])->name('province');
Route::get('/regency/{province_id}', [HomeController::class, 'getRegency']);
Route::get('/district/{regency_id}', [HomeController::class, 'getDistrict']);
Route::get('/village/{district_id}', [HomeController::class, 'getVillage']);

Route::get('/cek-tarif-post', function () {
    return view('pricelist');
});

Route::get('/debug', [HomeController::class, 'index']);

Route::get('/districts',[HomeController::class,'districts'])->name('districts');
