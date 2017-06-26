<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\FullGallery;

class GalleryController extends Controller
{
    public function index($slug){
        $relatedArray = [];

        $generalData = Gallery::where('slug', $slug)->first();

        if($generalData->tags){
            $relatedArray = Gallery::where('tags', 'LIKE', '%'.$generalData->tags[0].'%')
                                    ->limit(5)
                                    ->get(['name', 'slug', 'cover_photo_thumb']);
        }

        return view('main-description', compact('generalData', 'relatedArray'));
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
