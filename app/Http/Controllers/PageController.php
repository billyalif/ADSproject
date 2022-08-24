<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function backend(){
        return view('backend');
    }

    public function frontend(){
        return view('frontend');
    }

    public function techwriter(){
        return view('writer');
    }

    public function uiux(){
        return view('uiux');
    }

    public function dataanalyst(){
        return view('data');
    }

}
