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


//Los prefijos sirven para crear grupos de rutas, de esta manera todo lo que venga después del
//grupo de rutas 
//resource recibe 2 parametros: el nombre de la ruta y después el controlador del cual se van a definir las rutas
Route::group(['prefix'=>'admin'], function(){//anidar rutas de acceso

/*USERS*******************************************************/
	Route::resource('users','UserControllers');
	Route::get('users/{id}/destroy' ,[
		'uses' => 'UserControllers@destroy',
		'as' => 'users.destroy'
	]);
/*CATEGORIES*******************************************************/
	Route::resource('categories', 'CategoriesController');
	Route::get('categories/{id}/destroy' ,[
		'uses' => 'CategoriesController@destroy',
		'as' => 'categories.destroy'
	]);
	
});

/*Route::group(['middleware' =>['web'], 'prefix'=> 'admin'], function(){
  Route::resource('users', 'UserControllers');
  Route::get('users/{id}/destroy',[
    'uses'  => 'UserControllers@destroy',
    'as'    => 'users.destroy'
  ]);
});*/