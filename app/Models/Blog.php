<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getPrimaryImageAttribute($primary_image)
    {
        if($primary_image)
        {
            return  asset(path_image().$primary_image);
        }

        return  null;
    }


    public function getSecondaryImageAttribute($secondary_image)
    {
        if($secondary_image)
        {
            return  asset(path_image().$secondary_image);
        }

        return  null;
    }

    public function blogTags()
    {
        return $this->hasMany(BlogTag::class, 'blog_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Admin::class, 'author_id', 'id');
    }


    public function comment()
    {
        return $this->hasMany(BlogComment::class)->with('reply')->with('user')->where('parent_id', PARENT);
    }
}
