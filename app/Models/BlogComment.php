<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reply()
    {
        return $this->hasMany(BlogComment::class,'parent_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
