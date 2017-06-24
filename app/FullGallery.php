<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FullGallery extends Model
{
    protected $table = 'gallery_full';

    public function setImageGalleryFullAttribute($value){
         $this->attributes['image_gallery_full'] = json_encode($value);
    }

    public function getImageGalleryFullAttribute(){
        return json_decode($this->attributes['image_gallery_full']);
    }

    public $timestamps = false;
}
