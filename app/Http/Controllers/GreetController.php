<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetController extends Controller
{
    //greet blade test
    public function greet()
    {
        return view('greet');
    }
}
