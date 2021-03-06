<?php

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

use Foobooks\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', 'BookController@getIndex');

// Route::get('/books/{category}', function($category){
//     return "here be all the books in the <b>$category</b> category.";
// });

Route::get('/books/create', 'BookController@getCreate');
Route::post('/books/create', 'BookController@postCreate');

// question mark make argument optional
Route::get('/books/show/{title?}', 'BookController@getShow');

Route::get('/practice', function() {
    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Practice';
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/debug', function() {
    echo '<pre>';
    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';
    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes, certainly"; else echo "No thanks";
    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));
    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }
    echo '</pre>';
});
