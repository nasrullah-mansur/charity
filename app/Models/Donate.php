<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function  user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function  campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }
}
