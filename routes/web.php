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

Auth::routes();

Route::resource('cursos', 'CursoController')->middleware('admin');

Route::resource('turmas', 'TurmaController')->middleware('admin');

Route::resource('eventos', 'EventoController')->middleware('admin');

Route::get('eventos/{id}/listagem', 'EventoController@listagem');

Route::get('inscricoes', 'InscricaoController@index');

Route::post('inscricoes', 'InscricaoController@store');

Route::delete('inscricoes/{evento}/{usuario}', 'InscricaoController@destroy')->name('inscricoes.destroy');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('changePassword','Auth\ChangePasswordController@showChangePasswordForm');
Route::post('changePassword','Auth\ChangePasswordController@changePassword')->name('changePassword');

