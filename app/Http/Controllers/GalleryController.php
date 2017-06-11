<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    public function index($slug){
        $relatedArray = [];

        $generalData = Gallery::where('slug', $slug)->first();

        if($generalData->tags){
            $generalData->tags = json_decode($generalData->tags);
            $relatedArray = Gallery::where('tags', 'LIKE', '%'.$generalData->tags[0].'%')
                                    ->limit(5)
                                    ->get(['name', 'slug']);
        }

        if($generalData->artists){
            $generalData->artists = json_decode($generalData->artists);
        }

        if($generalData->languages){
            $generalData->languages = json_decode($generalData->languages);
        }

        return view('main-description', compact('generalData', 'relatedArray'));
    }

    public function create(){
        $tags = ["Action", "Sci-Fi", "Comedy", "Parody", "Super Power", "Supernatural", "Seinen"];
        $artists = ["Murata, Yusuke", "ONE"];
        $languages = ["English"];

        $gallery = new Gallery;

        $gallery->name = "One Punch Man Chapter 2";
        $gallery->slug = str_slug("One Punch Man Chapter 2", "-");
        $gallery->series = "One Punch Man";
        $gallery->series_slug = str_slug("One Punch Man");
        $gallery->description = "The seemingly ordinary and unimpressive Saitama has a rather unique hobby: being a hero. In order to pursue his childhood dream, he trained relentlessly for three years—and lost all of his hair in the process. Now, Saitama is incredibly powerful, so much so that no enemy is able to defeat him in battle. In fact, all it takes to defeat evildoers with just one punch has led to an unexpected problem—he is no longer able to enjoy the thrill of battling and has become quite bored.";
        $gallery->tags = json_encode($tags);
        $gallery->artists = json_encode($artists);
        $gallery->languages = json_encode($languages);

        $gallery->save();

        echo 'database entry created';
    }
}
