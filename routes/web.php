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
    return 'Retorno Index';
});


Route::get ('/api/status'      , ['as' => 'status.index'     , 'uses' => 'StatusController@index']);
Route::get ('/api/responsavel' , ['as' => 'responsavel.index', 'uses' => 'ResponsavelController@index']);

Route::get    ('/api/atividade'      , ['as' => 'atividade.index' , 'uses' => 'AtividadeController@index']);
Route::get    ('/api/atividade/{id}' , ['as' => 'atividade.show'  , 'uses' => 'AtividadeController@show']);

Route::post   ('/api/atividade'      , ['as' => 'atividade.create' , 'uses' => 'AtividadeController@create']);
Route::put    ('/api/atividade/{id}' , ['as' => 'atividade.update' , 'uses' => 'AtividadeController@update']);
Route::delete ('/api/atividade/{id}' , ['as' => 'atividade.delete' , 'uses' => 'AtividadeController@delete']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
