<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/qqq',   'ArticleController@index')->Middleware(['auth:api']);

Route::group(['middleware' => ['cors', 'json.response', 'auth:api']], function () {

    Route::post('/login',   'Auth\ApiAuthController@login')     ->name('login.api')     ->withoutMiddleware(['auth:api']);
    Route::post('/register','Auth\ApiAuthController@register')  ->name('register.api')  ->withoutMiddleware(['auth:api']);
    Route::post('/logout',  'Auth\ApiAuthController@logout')    ->name('logout.api')    ->withoutMiddleware(['auth:api']);

    Route::get('/user', function (Request $request) {
        //return auth()->user();
        //return 'welcome';
        //return $request->user();
        return redirect()->action('ArticleController@index');
    });                                                                                                 //})->withoutMiddleware(['auth:api']);


});


/*Route::group(['middleware' => ['cors', 'json.response']], function () {

    Route::get('/user', function (Request $request) {
        return 'welcome';
    });


});*/
