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
        //Data strings
        $title = "One Punch Man Chapter 3";
        $slug = str_slug($title, "-");
        $series = "One Punch Man";

        $description = "The seemingly ordinary and unimpressive Saitama has a rather unique hobby: being a hero. In order to pursue his childhood dream, he trained relentlessly for three years—and lost all of his hair in the process. Now, Saitama is incredibly powerful, so much so that no enemy is able to defeat him in battle. In fact, all it takes to defeat evildoers with just one punch has led to an unexpected problem—he is no longer able to enjoy the thrill of battling and has become quite bored.";

        $tags = ["Action", "Sci-Fi", "Comedy", "Parody", "Super Power", "Supernatural", "Seinen"];
        $artists = ["Murata, Yusuke", "ONE"];
        $languages = ["English"];

        //Initialize arrays for gallery
        $imgarr = [];
        $thumbarr = [];

        //Set paths for gallery
        $gallerydir = 'storage/images/' . $slug . '/gallery/';
        $thumbdir = 'storage/images/' . $slug . '/thumbs/';

        //Create paths for gallery
        if(!File::exists($gallerydir)){
            File::makeDirectory($gallerydir, 0775, true);
        }
        if(!File::exists($thumbdir)){
            File::makeDirectory($thumbdir, 0775, true);
        }

        //Grab zip archive from POST and extract to gallery
        $zip = new ZipArchive();
        $zip->open($request->gallery);
        $zip->extractTo($gallerydir);

        //Create thumbnails from gallery (Up to 5)
        $files = File::allFiles($gallerydir);
        for($i = 0; $i < count($files) && $i < 5; $i++){
            $filename = basename((string)$files[$i]);
            Image::make($files[$i])->fit(229, 343)->save(public_path($thumbdir.'thumb_'.$filename));
        }

        //Create gallery array
        foreach($files as $file){
            array_push($imgarr, stripslashes((string)$file));
        }

        //Create thumbnail gallery array
        $thumbfiles = File::allFiles($thumbdir);
        foreach($thumbfiles as $file){
            array_push($thumbarr, stripslashes((string)$file));
        }

        //Create cover photo
        //TODO allow manual override in form instead of using gallery array
        $path = $imgarr[0];
        $filename = basename($path);
        $fullpath = 'storage/images/' . $slug . '/cover/' . $filename;
        $fullpath_thumb = 'storage/images/' . $slug . '/cover/thumb_' . $filename;

        if(!File::exists('storage/images/' . $slug . '/cover/')){
            File::makeDirectory('storage/images/' . $slug . '/cover/', 0775, true);
        }
        Image::make($path)->save(public_path($fullpath));
        Image::make($path)->fit(229, 343)->save(public_path($fullpath_thumb));

        //Create new database entry
        $gallery = new Gallery;

        $gallery->name = $title;
        $gallery->slug = $slug;
        $gallery->series = $series;
        $gallery->series_slug = str_slug($series);
        $gallery->cover_photo = $fullpath;
        $gallery->cover_photo_thumb = $fullpath_thumb;
        $gallery->description = $description;
        $gallery->tags = json_encode($tags);
        $gallery->artists = json_encode($artists);
        $gallery->languages = json_encode($languages);
        $gallery->image_gallery_thumbs = json_encode($thumbarr);
        $gallery->image_gallery_full = json_encode($imgarr);

        $gallery->save();

        echo 'database entry created';
    }
}
