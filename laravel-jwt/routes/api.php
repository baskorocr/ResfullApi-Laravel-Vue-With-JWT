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
/**
 * route "/register"
 * @method "POST"
 */
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

Route::group(['prefix' => '/v1','middleware' => ['auth:api']], function () {

    Route::get('/user', function(Request $request){
        return $request->user();
    });
    Route::get('/users/{id}', [App\Http\Controllers\Api\LoginController::class, 'user']);
    

});


Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');



