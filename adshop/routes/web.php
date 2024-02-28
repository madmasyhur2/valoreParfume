<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return 'Welcome Admin';
})->middleware('role:Admin');

Route::get('/seller', function () {
    return 'Welcome Seller';
})->middleware('role:Seller');

Route::get('/user', function () {
    return 'Welcome User';
})->middleware('role:User');

Route::middleware(['auth','role:Admin'])->group(function(){
    Route::resource('roles', RoleController::class);
});
