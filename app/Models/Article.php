<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function image() {
        return $this->belongsTo(Image::class,'image_id','id');
    }

    public function content() {
        return $this->belongsTo(Content::class,'content_id','id');
    }

}
