<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\FullGallery;
use App\Series;

class GalleryController extends Controller
{
    public function index($slug){
        $relatedArray = [];

        $generalData = Gallery::where('slug', $slug)->first();

        $seriesData = Series::where('series_slug', $generalData->series_slug)->first();

        if($seriesData->tags){
            $relatedArray = Series::where('tags', 'LIKE', '%'.$seriesData->tags[0].'%')
                                    ->limit(5)
                                    ->get(['series', 'series_slug', 'cover_photo_thumb']);
        }


        return view('main-description', compact('generalData', 'relatedArray', 'seriesData'));
    }

    public function read($slug){
        $quickGallery = Gallery::where('slug', $slug)
                        ->get(['id', 'name', 'slug'])
                        ->first();

        $fullGallery = FullGallery::where('relation', $quickGallery->id)
                        ->first();

        return view('main-read', compact('quickGallery', 'fullGallery'));
    }
}
