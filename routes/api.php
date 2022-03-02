<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//Product Routing
Route::post('/product/add',"ProductController@add");
Route::get('/product/details/{id}',"ProductController@details");
Route::get('/product/list',"ProductController@list");
Route::put('/product/update',"ProductController@update");
Route::get('/ssguru/users',"UserController@ssguru");
Route::post('/product/uploadsingleimage',"ImageController@create");
Route::post('/product/uploadmultipleimage',"ImageController@multiple");
Route::get('/customer/list',"UserController@list");
Route::get('/customer/count',"UserController@usercount");
Route::get('/product/count',"ProductController@productcount");
Route::get('/dashboard',"DashboardController@dashboard");
Route::post('/product/singledelete',"ProductController@DeleteSingleProduct");
Route::post('/product/multidelete',"ProductController@DeleteMultipleProduct");
