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
                                    ->get(['name', 'slug', 'cover_photo_thumb']);
        }

        if($generalData->artists){
            $generalData->artists = json_decode($generalData->artists);
        }

        if($generalData->languages){
            $generalData->languages = json_decode($generalData->languages);
        }

        return view('main-description', compact('generalData', 'relatedArray'));
    }
}
