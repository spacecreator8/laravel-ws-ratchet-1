<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function index(){
        return view('index');
    }

    public function recipient(){
        return view('recipient');
    }

    public function store(Request $request){
        return view('recipient');
    }
}
