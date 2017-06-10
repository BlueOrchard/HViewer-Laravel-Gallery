<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index($mangaid){
        $generalData = DB::table('gallery_items')->where('id', $mangaid)->first();

        $tags = ["Action", "Sci-Fi", "Comedy", "Parody", "Super Power", "Supernatural", "Seinen"];

        return view('main-description', compact('generalData', 'tags'));
    }
}
