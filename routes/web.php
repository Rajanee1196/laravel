<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
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
Route::resource('product', productController::class);
Route::controller(productController::class)->group(function(){
     //Route::post('searchdata', 'searchdata')->name('searchdata');
    Route::get('autocomplete', 'autocomplete')->name('autocomplete');
});
