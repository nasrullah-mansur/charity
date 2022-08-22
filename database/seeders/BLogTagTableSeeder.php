<?php

namespace Database\Seeders;

use App\Models\BlogTag;
use Illuminate\Database\Seeder;

class BLogTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // blog 1
        BlogTag::create([
            'blog_id' => 1,
            'tag_id' => 1,
        ]);
        BlogTag::create([
            'blog_id' => 1,
            'tag_id' => 4,
        ]);
        BlogTag::create([
            'blog_id' => 1,
            'tag_id' => 2,
        ]);
        BlogTag::create([
            'blog_id' => 1,
            'tag_id' => 3,
        ]);
// blog 2
        BlogTag::create([
            'blog_id' => 2,
            'tag_id' => 3,
        ]);
        BlogTag::create([
            'blog_id' => 2,
            'tag_id' => 4,
        ]);
        BlogTag::create([
            'blog_id' => 2,
            'tag_id' => 5,
        ]);
        BlogTag::create([
            'blog_id' => 2,
            'tag_id' => 6,
        ]);


        // blog 3
        BlogTag::create([
            'blog_id' => 3,
            'tag_id' => 2,
        ]);
        BlogTag::create([
            'blog_id' => 3,
            'tag_id' => 4,
        ]);
        BlogTag::create([
            'blog_id' => 3,
            'tag_id' => 6,
        ]);
        BlogTag::create([
            'blog_id' => 3,
            'tag_id' => 3,
        ]);
    }
}
