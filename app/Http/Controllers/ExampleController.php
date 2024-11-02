<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{

    /*
    public function __construct(){
        $this->middleware('test'); //this will let middleware work on the whole controller
    }
   */
    public function __construct(){
        $this->middleware('test')->only('index2'); //this will let middleware work on index2 method only in the controller
    }


    public function index(){
        return view('welcome');
    }



    public function index2(){
        return view('welcome');
        
    }






}
