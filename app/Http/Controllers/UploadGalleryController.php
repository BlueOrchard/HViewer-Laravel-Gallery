<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Image;
use File;
use ZipArchive;

class UploadGalleryController extends Controller
{
    public function index(){
        return view('main-upload');
    }

    public function zipCreate(Request $request){
        $title = "One Punch Man Chapter 7";
        $slug = str_slug($title, "-");

        $gallerydir = 'storage/images/' . $slug . '/gallery/';
        $thumbdir = 'storage/images/' . $slug . '/thumbs/';

        if(!File::exists($gallerydir)){
            File::makeDirectory($gallerydir, 0775, true);
        }

        if(!File::exists($thumbdir)){
            File::makeDirectory($thumbdir, 0775, true);
        }

        $zip = new ZipArchive();
        $zip->open($request->gallery);
        $zip->extractTo($gallerydir);

        $files = File::allFiles($gallerydir);
        for($i = 0; $i < count($files) && $i < 5; $i++){
            $filename = basename((string)$files[$i]);
            Image::make($files[$i])->fit(229, 343)->save(public_path($thumbdir.$filename));
        }
    }

    public function create(){
        $title = "One Punch Man Chapter 7";
        $slug = str_slug($title, "-");

        $path = "http://www.gstatic.com/tv/thumb/tvbanners/13132769/p13132769_b_v8_aa.jpg";
        $filename = basename($path);
        $fullpath = 'storage/images/' . $slug . '/cover/' . $filename;
        $fullpath_thumb = 'storage/images/' . $slug . '/cover/thumb_' . $filename;

        if(!File::exists('storage/images/' . $slug . '/cover/')){
            File::makeDirectory('storage/images/' . $slug . '/cover/', 0775, true);
        }
        Image::make($path)->save(public_path($fullpath));
        Image::make($path)->fit(229, 343)->save(public_path($fullpath_thumb));

        $tags = ["Action", "Sci-Fi", "Comedy", "Parody", "Super Power", "Supernatural", "Seinen"];
        $artists = ["Murata, Yusuke", "ONE"];
        $languages = ["English"];

        $gallery = new Gallery;

        $gallery->name = $title;
        $gallery->slug = $slug;
        $gallery->series = "One Punch Man";
        $gallery->series_slug = str_slug("One Punch Man");
        $gallery->cover_photo = '/'.$fullpath;
        $gallery->cover_photo_thumb = '/'.$fullpath_thumb;
        $gallery->description = "The seemingly ordinary and unimpressive Saitama has a rather unique hobby: being a hero. In order to pursue his childhood dream, he trained relentlessly for three years—and lost all of his hair in the process. Now, Saitama is incredibly powerful, so much so that no enemy is able to defeat him in battle. In fact, all it takes to defeat evildoers with just one punch has led to an unexpected problem—he is no longer able to enjoy the thrill of battling and has become quite bored.";
        $gallery->tags = json_encode($tags);
        $gallery->artists = json_encode($artists);
        $gallery->languages = json_encode($languages);

        $gallery->save();

        echo 'database entry created';
    }
}
