<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignComment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reply()
    {
        return $this->hasMany(CampaignComment::class,'parent_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
