<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function blogTag()
    {
        return $this->hasMany(BlogTag::class,'tag_id', 'id');
    }
}
