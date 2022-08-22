<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImageAttribute($image)
    {
        if($image){

            return asset(path_image().$image);
        }

        return null;
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function isCampaignActive(){
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id')->where(['status' => CAMPAIGN_RUNNING, 'is_approved' => true])->where('end_date', '>=', Carbon::now()->toDateString());
    }
}
