<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Tags;

class BrowseController extends Controller
{
    public function index(){
        echo Input::get('q');

        $allTags = Tags::get();

        return view('browse-main', compact('allTags'));
    }
}
