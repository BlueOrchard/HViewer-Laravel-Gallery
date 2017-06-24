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
        
        if($generalData->image_gallery_thumbs){
            $generalData->image_gallery_thumbs = json_decode($generalData->image_gallery_thumbs);
        }

        return view('main-description', compact('generalData', 'relatedArray'));
    }

    public function read($slug){
        $quickGallery = Gallery::where('slug', $slug)
                        ->get(['id', 'name', 'slug'])
                        ->first();

        $fullGallery = FullGallery::where('relation', $quickGallery->id)
                        ->first();               

        $fullGallery->image_gallery_full = json_decode($fullGallery->image_gallery_full);

        return view('main-read', compact('fullGallery'));
    }
}
