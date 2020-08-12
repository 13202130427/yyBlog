<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

    public function rotation_show() {
        return $this->hasOne(RotationShow::class,'image_id');
    }

    public function article() {
        return $this->hasOne(Article::class,'image_id');
    }
}
