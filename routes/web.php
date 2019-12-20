<?php

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

use Illuminate\Support\Facades\Route;
use App\Http\CurlController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('get-curl','CurlController@getCurl');
Route::get('post-curl','CurlController@postCurl');
Route::get('put-curl','CurlController@putCurl');
Route::get('patch-curl','CurlController@patchCurl');
Route::get('delete-curl','CurlController@deleteCurl');