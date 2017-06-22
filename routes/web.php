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
Route::get('add-manga/new', ['uses' => 'UploadGalleryController@index']);
Route::post('add-manga', ['uses' => 'UploadGalleryController@zipCreate']);

/* --- INCOMPLETE ROUTES --- */
//Homepage Route
Route::get('/', ['uses' => 'HomepageController@index']);

//Archive routes for linear browsing
Route::get('archive/', ['uses' => 'ArchiveController@index']);
Route::get('archive/page/{num}', ['uses' => 'ArchiveController@index']);

//Search and filter routes. Possibly merge these two routes together.
Route::get('search/', ['uses' => 'BrowseController@index']);
Route::get('filter/', ['uses' => 'BrowseController@index']);

Route::get('login/', function ($id) {
    //TODO login and register 
});

//User profile routes. Start authentication middleware here.
Route::get('profile/', ['uses' => 'ProfileController@index']);
Route::get('favorites/', ['uses' => 'ProfileController@favorites']);

//Admin function routes. Add admin authentication middleware here.
Route::get('manga-admin/', ['uses' => 'AdminController@index']);