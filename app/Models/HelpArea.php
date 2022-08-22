<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpArea extends Model
{
    use HasFactory;
   protected $guarded = [];

    public function getBackgroundImageAttribute($background_image)
    {
        if($background_image){
            return asset(path_image().$background_image);
        }

        return null;
    }
}
