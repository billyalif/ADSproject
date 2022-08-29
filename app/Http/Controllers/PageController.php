<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function product(){
        return view('product');
    }

    public function store(){
        return view('store');
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
