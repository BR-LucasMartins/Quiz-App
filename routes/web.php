<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'GameController@index')->name('site.index');

Route::post('/game', 'GameController@game')->name('site.game');
Route::get('/game', 'GameController@gameNext')->name('site.game.next');
Route::post('/game-final', 'GameController@calc')->name('site.game.calc');
Route::get('/game-answers', 'GameController@answers')->name('site.game.answers');

//Admin
Route::resource('/categoria', 'CategoryController');
Route::get('categoria/delete/{id}', 'CategoryController@delete')->name('categoria.delete');
Route::resource('/pergunta', 'QuestionController');
Route::get('pergunta/edit/{id}', 'QuestionController@edit')->name('pergunta.edit');
Route::post('pergunta/update/{id}', 'QuestionController@update')->name('pergunta.update');
Route::get('pergunta/delete/{id}', 'QuestionController@delete')->name('pergunta.delete');
