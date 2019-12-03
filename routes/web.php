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

Route::resource('/projetos', 'ProjetoController')
    ->middleware('auth');

    Route::resource('/tasks','TaskController');


// Route::resource('/projetos', 'ProjetoController');

// Route::group(['middleware' => ['auth']], function () {

//     Route::prefix('projetos')->name('projetos.')->group(function(){
//         Route::get('/','ProjetosController@index')->name('index');
//         Route::post('/','ProjetosController@update')->name('update');
//         Route::delete('/','ProjetosController@destroy')->name('delete');

//             Route::prefix('tarefas')->name('tarefas.')->group(function(){
//                 Route::get('/','TaskController@index')->name('index');
//                 Route::post('/','TaskController@update')->name('update');
//                 Route::delete('/','TaskController@destroy')->name('delete');

//         });

//     });

// });





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
