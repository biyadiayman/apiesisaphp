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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/absences', 'AbsencesController@all');

Route::get('/absences/{idEtudiant}', 'AbsencesController@absencesEtudiant');

Route::get('/matieres', 'MatiereController@all');

Route::get('/matieres/{idMatiere}', 'MatiereController@getMatiere');

Route::get('/etudiants', 'EtudiantController@all');

Route::get('/news', 'NewsController@all');
Route::post('/news', 'NewsController@add');
Route::delete('/news/{id}', 'NewsController@remove');

