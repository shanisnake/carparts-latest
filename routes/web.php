<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;
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
    // return 'welcome to laravel245';
});



Route::controller(ProductController::class)->group(function () {
    Route::get('/product/list', 'index');
    Route::get('/product/detail/{id}', 'detail');
});



Route::any('{query}',function() {
    return redirect('/'); })->where('query', '.*');

