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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');

    Route::group(['middleware' => 'auth:api'], function(){
        //Route::get('user', 'AuthController@user');
        //Route::post('logout', 'AuthController@logout');
        Route::get('users', 'UserController@index')->middleware('isAdmin');
        Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrProf');
    });
});
//Route::group(['middleware' => 'auth:api'], function(){
    // Users
  //  Route::get('users', 'UserController@index')->middleware('isAdmin');
    //Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrProf');
//});


Route::resource('etablissements', 'etablissementsAPIController');

Route::resource('classes', 'classesAPIController');

Route::resource('annees', 'anneesAPIController');

Route::resource('absences', 'absencesAPIController');

Route::resource('justifications', 'justificationsAPIController');

Route::resource('presences', 'presencesAPIController');

Route::resource('users_matieres', 'users_matieresAPIController');