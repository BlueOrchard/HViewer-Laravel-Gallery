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

Route::get('manga/{slug}', ['as' => 'slug', 'uses' => 'GalleryController@index']);
Route::get('manga/{slug}/read', function(){
    echo 'TODO: Add Reading Controller/View';
});

Route::get('add-manga/new', ['uses' => 'UploadGalleryController@index']);
Route::post('add-manga', ['uses' => 'UploadGalleryController@zipCreate']);