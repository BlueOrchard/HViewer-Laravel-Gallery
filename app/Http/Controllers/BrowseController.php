<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BrowseController extends Controller
{
    public function index(){
        echo Input::get('q');

        return view('browse-main');
    }
}
