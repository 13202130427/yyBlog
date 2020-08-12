<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RotationShow extends Model
{
    protected $table = 'rotation_show';

    public function image() {
        return $this->belongsTo(Image::class,'image_id','id');
    }
}
