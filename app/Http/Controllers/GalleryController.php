<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    public function index($slug){
        $generalData = Gallery::where('slug', $slug)->first();

        $generalData->tags = json_decode($generalData->tags);

        return view('main-description', compact('generalData'));
    }

    public function create(){
        $tags = ["Action", "Sci-Fi", "Comedy", "Parody", "Super Power", "Supernatural", "Seinen"];

        $gallery = new Gallery;

        $gallery->name = "One Punch Man";
        $gallery->slug = str_slug("One Punch Man", "-");
        $gallery->description = "The seemingly ordinary and unimpressive Saitama has a rather unique hobby: being a hero. In order to pursue his childhood dream, he trained relentlessly for three years—and lost all of his hair in the process. Now, Saitama is incredibly powerful, so much so that no enemy is able to defeat him in battle. In fact, all it takes to defeat evildoers with just one punch has led to an unexpected problem—he is no longer able to enjoy the thrill of battling and has become quite bored.";
        $gallery->tags = json_encode($tags);

        $gallery->save();

        echo 'database entry created';
    }
}
