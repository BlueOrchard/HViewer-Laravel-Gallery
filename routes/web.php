<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* --- COMPLETED ROUTES --- */
//Individual manga/gallery routes
Route::get('manga/{slug}', ['as' => 'slug', 'uses' => 'GalleryController@index']);
Route::get('manga/{slug}/read', ['as' => 'slug', 'uses' => 'GalleryController@read']);


/* --- ROUTES IN PROGRESS --- */

//TODO finish admin panel and add links from admin panel to these routes
Route::get('add-manga/new', ['uses' => 'UploadGalleryController@index']);
Route::post('add-manga', ['uses' => 'UploadGalleryController@zipCreate']);


/* --- ROUTES TO DO NEXT --- */
//      - These routes will be done in one sitting

//Homepage Route
Route::get('/', ['uses' => 'HomepageController@index']);

//Series routes for linear browsing
Route::get('series/{slug}', ['uses' => 'SeriesController@index']);
Route::get('series/{slug}/page/{num}', ['uses' => 'SeriesController@index']);

//Search and filter routes. Possibly merge these two routes together.
Route::get('search/', ['uses' => 'BrowseController@index']);
Route::get('browse/', ['uses' => 'BrowseController@index']);


/* --- INCOMPLETE ROUTES --- */

Route::get('login/', function ($id) {
    //TODO login and register 
});

//User profile routes. Start authentication middleware here.
Route::get('profile/', ['uses' => 'ProfileController@index']);
Route::get('favorites/', ['uses' => 'ProfileController@favorites']);

//Admin function routes. Add admin authentication middleware here.
Route::get('manga-admin/', ['uses' => 'AdminController@index']);