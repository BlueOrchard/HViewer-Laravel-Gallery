<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    public function index($mangaid){
        $generalData = Gallery::where('id', $mangaid)->first();

        $tags = ["Action", "Sci-Fi", "Comedy", "Parody", "Super Power", "Supernatural", "Seinen"];

        return view('main-description', compact('generalData', 'tags'));
    }

    public function create(){
        $galleries = Gallery::all();

        foreach ($galleries as $gallery) {
            echo $gallery->name;
        }
    }
}
