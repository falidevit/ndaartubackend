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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('matieres', 'matieresController');

Route::resource('etablissements', 'etablissementsController');

Route::resource('classes', 'classesController');

Route::resource('annees', 'anneesController');

Route::resource('absences', 'absencesController');

Route::resource('justifications', 'justificationsController');

Route::resource('presences', 'presencesController');

Route::resource('usersMatieres', 'users_matieresController');