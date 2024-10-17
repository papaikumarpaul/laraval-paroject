<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DomainController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('category',CategoryController::class);
Route::resource('app',DomainController::class);
// Route::post("app/check-dns/{domain}",DomainController::class,'checkDNSRecord');