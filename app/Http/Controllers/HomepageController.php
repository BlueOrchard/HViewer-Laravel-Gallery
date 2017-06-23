<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class HomepageController extends Controller
{
    public function index(){
        $recentData = Gallery::latest()->take(5)->get();
        $randomData = Gallery::inRandomOrder()->take(5)->get();

        return view('home', compact('recentData', 'randomData'));
    }
}
