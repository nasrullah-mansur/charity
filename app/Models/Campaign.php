<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getImageAttribute($image)
    {
        if($image)
        {
            return asset(path_image().$image);
        }

        return null;
    }

    public function getDocumentAttribute($document)
    {
        if($document)
        {
            return asset(path_image().$document);
        }

        return null;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donar()
    {
        return $this->hasMany(Donate::class, 'campaign_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(CampaignComment::class)->with('reply')->with('user')->where('parent_id', PARENT);
    }

    public function withdraw()
    {
        return $this->hasOne(Withdraw::class);
    }


}
