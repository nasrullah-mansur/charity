<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function getFirstStageImageAttribute($first_statge_image){
        if($first_statge_image)
        {
            return asset(path_image().$first_statge_image);
        }
        return null;
    }

    public function getSecondStageImageAttribute($second_statge_image){
        if($second_statge_image)
        {
            return asset(path_image().$second_statge_image);
        }
        return null;
    }

    public function getThirdStageImageAttribute($third_statge_image){
        if($third_statge_image)
        {
            return asset(path_image().$third_statge_image);
        }
        return null;
    }
    public function getFourthStageImageAttribute($fourth_statge_image){
        if($fourth_statge_image)
        {
            return asset(path_image().$fourth_statge_image);
        }
        return null;
    }

    public function getFifthStageImageAttribute($fifth_statge_image){
        if($fifth_statge_image)
        {
            return asset(path_image().$fifth_statge_image);
        }
        return null;
    }

}










