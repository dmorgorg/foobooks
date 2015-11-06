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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', function(){
    return 'here be all the books';
});

Route::get('/books/{category}', function($category){
    return "here be all the books in the <b>$category</b> category.";
});

Route::get('/new', function() {
    $view  = '<form method="POST">';
    $view .= csrf_field(); # This will be explained more later
    $view .= 'Title: <input type="text" name="title">';
    $view .= '<input type="submit">';
    $view .= '</form>';
    return $view;
});

Route::post('/new', function() {
    $input =  Input::all();
    print_r($input);
});

Route::get('/practice', function() {
    $data = Array('foo' => 'bar');
   Debugbar::info($data);
   Debugbar::error('Error!');
   Debugbar::warning('Watch out…');
   Debugbar::addMessage('Another message', 'mylabel');

   return 'Practice';
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
