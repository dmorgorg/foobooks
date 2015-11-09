<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;

use Foobooks\Http\Requests;
use Foobooks\Http\Controllers\Controller;

class BookController extends Controller
{
    public function __contruct(){
        // do any initialization here
    }

    /**
    * Responds to requests to GET /books
    */
    public function getIndex()
    {
        return 'List all the books (from controller)';
    }

    /**
    * Responds to requests to GET /books/show/{id}
    */
    // null allows function call without $title argument
    public function getShow($title = null)
    {
        return view('books.show')->with('title', $title);
    }

    /**
    * Responds to requests to GET /books/create
    */
    public function getCreate() {
        // $view  = '<form method="POST">';
        // $view .= csrf_field(); # This will be explained more later
        // $view .= 'Title (from controller): <input type="text" name="title">';
        // $view .= '<input type="submit">';
        // $view .= '</form>';
        // return $view;
        return view('books.create');
    }

    /**
    * Responds to requests to POST /books/create
    */
    public function postCreate() {
        return 'Process adding new book'.$_POST['title'];
    }


}
