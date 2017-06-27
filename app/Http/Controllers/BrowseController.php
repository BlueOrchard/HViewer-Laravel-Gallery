<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Tags;
use App\Gallery;
use App\Series;

class BrowseController extends Controller
{
    public function index(){
        echo Input::get('q');

        $allTags = Tags::orderBy('tag_name')->get();
        $filteredPosts = Series::latest()->get();

        return view('browse-main', compact('allTags', 'filteredPosts'));
    }
}
