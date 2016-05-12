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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return redirect('/tasks');
// });

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









// Route::get('/practice', 'Controller@getPracticePage');
//
// Route::get('/practice/ex1', 'Controller@getEx1');
// Route::get('/practice/ex2', 'Controller@getEx2');
// Route::get('/practice/ex4', 'Controller@getEx4');
// Route::get('/practice/ex5', 'Controller@getEx5');













// Route::get('/show-login-status', function() {
//
//     # You may access the authenticated user via the Auth facade
//     $user = Auth::user();
//
//     if($user) {
//         echo 'You are logged in.';
//         dump($user->toArray());
//     } else {
//         echo 'You are not logged in.';
//     }
//
//     return;
//
// });
//
// Route::get('/debug', function() {
//
//     echo '<pre>';
//
//     echo '<h1>Environment</h1>';
//     echo App::environment().'</h1>';
//
//     echo '<h1>Debugging?</h1>';
//     if(config('app.debug')) echo "Yes"; else echo "No";
// 
//     echo '<h1>Database Config</h1>';
//     /*
//     The following line will output your MySQL credentials.
//     Uncomment it only if you're having a hard time connecting to the database and you
//     need to confirm your credentials.
//     When you're done debugging, comment it back out so you don't accidentally leave it
//     running on your live server, making your credentials public.
//     */
//     //print_r(config('database.connections.mysql'));
//
//     echo '<h1>Test Database Connection</h1>';
//     try {
//         $results = DB::select('SHOW DATABASES;');
//         echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
//         echo "<br><br>Your Databases:<br><br>";
//         print_r($results);
//     }
//     catch (Exception $e) {
//         echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
//     }
//
//     echo '</pre>';
//
// });
