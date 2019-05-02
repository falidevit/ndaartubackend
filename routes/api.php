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
    Route::post('registerProfesseur', 'AuthController@registerProfesseur');
    Route::post('registerAdmin', 'AuthController@registerAdmin');
    Route::post('registerEleve', 'AuthController@registerEleve');
    Route::post('registerParent', 'AuthController@registerParent');
    Route::get('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');
    Route::get('refresh', 'AuthController@refresh');
    Route::get('modification', 'AuthController@refresh');

    Route::group(['middleware' => 'auth:api'], function(){
        //Route::get('user', 'AuthController@user');
        //Route::post('logout', 'AuthController@logout');
    Route::get('users', 'UserAPIController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'UserAPIController@show')->middleware('isAdminOrProf');
    });
});



        Route::resource('etablissements', 'etablissementsAPIController');

        Route::resource('classes', 'classesAPIController');

        Route::resource('annees', 'anneesAPIController');

        Route::resource('absences', 'absencesAPIController');

        Route::resource('all_absences', 'absencesAPIController');

        Route::resource('justifications', 'justificationsAPIController');

        Route::resource('presences', 'presencesAPIController');

        Route::resource('users_matieres', 'users_matieresAPIController');
