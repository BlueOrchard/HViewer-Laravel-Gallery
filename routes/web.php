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

//Normal routes
Route::get('/', function ($id) {
    //TODO add homepage
});

//Individual manga/gallery routes
Route::get('manga/{slug}', ['as' => 'slug', 'uses' => 'GalleryController@index']);
Route::get('manga/{slug}/read', ['as' => 'slug', 'uses' => 'GalleryController@read']);

//Archive routes for linear browsing
Route::get('archive/', function ($id) {
    //TODO add archive page
});
Route::get('archive/page/{num}', function ($id) {
    //TODO add archive page and pagination
});

//Search and filter routes. Possibly merge these two routes together.
Route::get('search/{$query}', function ($id) {
    //TODO add search page
});
Route::get('filter/', function ($id) {
    //TODO add filter page
    //POSSIBLY MERGE WITH SEARCH PAGE (Browse)
});

Route::get('login/', function ($id) {
    //TODO login and register 
});

//User profile routes. Start authentication middleware here.
Route::get('profile/', function ($id) {
    //TODO add profile page
});
Route::get('favorites/', function ($id) {
    //TODO add favorites page
});

//Admin function routes. Add admin authentication middleware here.
Route::get('manga-admin/', function ($id) {
    //TODO add admin page for galleries/manga
});
Route::get('add-manga/new', ['uses' => 'UploadGalleryController@index']);
Route::post('add-manga', ['uses' => 'UploadGalleryController@zipCreate']);