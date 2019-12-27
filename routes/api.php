<?php

use Illuminate\Http\Request;
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

//JWT middleware definisan u kontrolerima

Route::post('login', 'Auth\LoginController@authenticate');
Route::post('register', 'RegisterController@store');
Route::get('shops/available', 'ShopController@availableShops');
Route::get('shops/for-articles', 'ShopController@shopsForArticles');
Route::resource('shops', 'ShopController');
Route::resource('managers', 'ManagerController');
Route::resource('articles', 'ArticleController');
Route::resource('comments', 'CommentController');
