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
        $query     = Input::get('q');
        $language  = Input::get('language');
        $tags      = Input::get('tags');
        $artist    = Input::get('artist');

        if($query){
            $filteredPosts = Series::where('series', 'LIKE', '%'.$query.'%')
                             ->latest()
                             ->get();
        } else {
            $filteredPosts = Series::where('languages', 'LIKE', '%'.$language.'%')
                            ->where('artists', 'LIKE', '%'.$artist.'%')
                            ->where(function($q) use ($tags){
                                if($tags){
                                    foreach($tags as $tag){
                                        $q->where('tags', 'LIKE', '%'.$tag.'%');
                                    }
                                }
                            })
                            ->latest()
                            ->get();
        }

        $allTags = Tags::orderBy('tag_name')->get();
        $JSONQuery = json_encode(['query' => $query,
                      'language' => $language,
                      'tags' => $tags,
                      'artist' => $artist]);
 
        return view('browse-main', compact('allTags', 'filteredPosts', 'JSONQuery'));
    }
}
