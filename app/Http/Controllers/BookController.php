<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;

use Foobooks\Http\Requests;
use Foobooks\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return 'List all the books';
    }

    /**
     *
     * Responds to requests to GET /books/show/{id}
     *
     */
    public function getShow($id)
    {
        return 'Show book: '.$id;
    }

    /**
    * Responds to requests to GET /books/create
    */
   public function getCreate() {
       return 'Form to create a new book';
   }

   /**
    * Responds to requests to POST /books/create
    */
   public function postCreate() {
       return 'Process adding new book';
   }


}
