<?php



# authentication

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');

Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/logout', 'Auth\AuthController@logout');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'Controller@getHello');



Route::group(['middleware' => 'auth'], function() {
    Route::get('/tasks', 'Controller@getTasks');

    Route::get('/create', 'Controller@getCreate');
    Route::post('/create', 'Controller@postCreate');

    Route::get('/tasks/incomplete', 'Controller@getIncompleteTasks');
    Route::get('/tasks/completed', 'Controller@getCompletedTasks');

    Route::get('/task/edit/{id?}', 'Controller@getEdit');
    Route::post('/task/edit/{id?}', 'Controller@postEdit');

    Route::get('/task/delete/{id?}', 'Controller@getDoDelete');

    Route::get('/task/complete/{id?}', 'Controller@getDoComplete');

    Route::get('/task/search', 'Controller@getSearch');
    Route::post('/task/search', 'Controller@postSearch');


});
