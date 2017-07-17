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

/*Route::get('test', function () {
    return view('test/test');
});*/

//para entrar a esta ruta se hace con:
//http://localhost:8000/articles/view/1 , el 1 es porque hay que pasar un valor.

Route::group(['prefix'=>'articles'], function(){//anidar rutas de acceso

//llamamos a un controlador y a una funcion especifica de el, pasando como parametro id
// y con un nombre o alias de articlesview que esta dentro del grupo de rutas articles.
	Route::get('view/{id}', [
		'uses' => 'testcontroller@view',
		'as' => 'articlesview'
	]);
});