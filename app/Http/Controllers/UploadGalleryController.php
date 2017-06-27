<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\FullGallery;
use App\Series;
use App\Tags;
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
        //TODO replace the below values with the POST $request values
        $title = "One Punch Man Chapter 4";
        $slug = str_slug($title, "-");

        $series = "Test Series";
        $series_slug = str_slug($series);

        $description = "The seemingly ordinary and unimpressive Saitama has a rather unique hobby: being a hero. In order to pursue his childhood dream, he trained relentlessly for three years—and lost all of his hair in the process. Now, Saitama is incredibly powerful, so much so that no enemy is able to defeat him in battle. In fact, all it takes to defeat evildoers with just one punch has led to an unexpected problem—he is no longer able to enjoy the thrill of battling and has become quite bored.";

        $tags = ["Action", "Comedy", "Parody", "Super Power", "Supernatural", "Seinen"];
        $artists = ["Murata, Yusuke", "ONE"];
        $languages = ["English"];

        //Create new database entry
        $gallery = new Gallery;

        $gallery->name = $title;
        $gallery->slug = $slug;
        $gallery->series = $series;
        $gallery->series_slug = $series_slug;

        //Gallery should also have its own description as well
        $gallery->description = $description;
        
        /* Moving this over to Series DB table (code at the bottom)
            $gallery->description = $description;
            $gallery->tags = $tags;
            $gallery->artists = $artists;
            $gallery->languages = $languages;
        */

        //Assigning default values for database creation
        $gallery->cover_photo = "";
        $gallery->cover_photo_thumb = "";
        $gallery->image_gallery_thumbs = "";
        $gallery->image_gallery_full = "";

        $gallery->save();

        //Initialize arrays for gallery
        $imgarr = [];
        $thumbarr = [];

        //Set paths for gallery
        $gallerydir = 'storage/images/' . $gallery->id . '/gallery/';
        $thumbdir = 'storage/images/' . $gallery->id . '/thumbs/';

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
        $fullpath = 'storage/images/' . $gallery->id . '/cover/' . $filename;
        $fullpath_thumb = 'storage/images/' . $gallery->id . '/cover/thumb_' . $filename;

        if(!File::exists('storage/images/' . $gallery->id . '/cover/')){
            File::makeDirectory('storage/images/' . $gallery->id . '/cover/', 0775, true);
        }
        Image::make($path)->save(public_path($fullpath));
        Image::make($path)->fit(229, 343)->save(public_path($fullpath_thumb));

        //Add image paths to database
        $gallery->cover_photo = $fullpath;
        $gallery->cover_photo_thumb = $fullpath_thumb;
        $gallery->image_gallery_thumbs = $thumbarr;
        $gallery->image_gallery_full = "";

        $gallery->save();

        //Full Gallery JSON to be saved in a different table
        $fullGallery = new FullGallery();

        $fullGallery->relation = $gallery->id;
        $fullGallery->image_gallery_full = $imgarr;

        $fullGallery->save();

        //Create Series Entry in Series Table if not exists
        //If it exists, assign new thumbnail. <- this might change in the future
        //once admin panel is done.
        $newSeries = Series::where('series_slug',  $series_slug)->first();
        if(!$newSeries){
            $createSeries = new Series();

            $createSeries->cover_photo = $fullpath;
            $createSeries->cover_photo_thumb = $fullpath_thumb;

            $createSeries->series = $series;
            $createSeries->series_slug = $series_slug;

            $createSeries->description = $description;
            $createSeries->tags = $tags;
            $createSeries->artists = $artists;
            $createSeries->languages = $languages;

            $createSeries->save();
        } else {
            $newSeries->cover_photo = $fullpath;
            $newSeries->cover_photo_thumb = $fullpath_thumb;

            $newSeries->save();
        }

        //Create Tag entries in Tags table if not exists
        foreach($tags as $tag){
            $newTags = Tags::where('tag_name', $tag)->first();
            if(!$newTags){
                $createTag = new Tags();

                $createTag->tag_name = $tag;
                $createTag->tag_slug = str_slug($tag);

                $createTag->save();
            }
        }


        echo 'database entry created';
    }
}
