<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImportController;
use Illuminate\Http\Request;
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


// product details and list page path
Route::controller(ProductController::class)->group(function () {
    Route::get('/product/list', 'list');
    Route::get('/product/detail/{id}', 'detail');
});


// Route::controller(ImportController::class)->group(function () {
//     Route::get('/test', 'index');
// });


// disable all externel url
Route::any('{query}',function() {
    return redirect('/'); })->where('query', '.*');

