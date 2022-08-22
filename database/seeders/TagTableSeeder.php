<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Tag::create([
            'pl_name' => 'Donation',
            'slug' => time().'-donation',
            'sl_name' => 'Donation',
            'active_status' => true,
        ]);
        Tag::create([
            'pl_name' => 'Child Education',
            'slug' => time().'-child-education',
            'sl_name' => 'Child Education',
            'active_status' => true,
        ]);
        Tag::create([
            'pl_name' => 'Human Rights',
            'slug' => time().'-human-rights',
            'sl_name' => 'Human Rights',
            'active_status' => true,
        ]);
        Tag::create([
            'pl_name' => 'Food & Nutrition',
            'slug' => time().'-Food-&-nutrition',
            'sl_name' => 'Food & Nutrition',
            'active_status' => true,
        ]);
        Tag::create([
            'pl_name' => 'Peoples Problems',
            'slug' => time().'-peoples-problems-1',
            'sl_name' => 'Peoples Problems',
            'active_status' => true,
        ]);
        Tag::create([
            'pl_name' => 'Peoples Problems',
            'slug' => time().'-peoples-problems-2',
            'sl_name' => 'Peoples Problems',
            'active_status' => true,
        ]);

    }
}
