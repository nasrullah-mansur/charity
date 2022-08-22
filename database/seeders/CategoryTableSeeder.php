<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'pl_name' => 'Donation',
            'slug' => time().'-donation',
            'sl_name' => 'Donation',
            'post_category' => true,
            'campaign_category' => true,
        ]);
        Category::create([
            'pl_name' => 'Child Education',
            'slug' => time().'-child-education',
            'sl_name' => 'Child Education',
            'post_category' => true,
            'campaign_category' => true,
        ]);
        Category::create([
            'pl_name' => 'Human Rights',
            'slug' => time().'-human-rights',
            'sl_name' => 'Human Rights',
            'post_category' => true,
            'campaign_category' => true,
        ]);
        Category::create([
            'pl_name' => 'Food & Nutrition',
            'slug' => time().'-food-&-nutrition',
            'sl_name' => 'Food & Nutrition',
            'post_category' => true,
            'campaign_category' => true,
        ]);
        Category::create([
            'pl_name' => 'Peoples Problems',
            'slug' => time().'-peoples-problems',
            'sl_name' => 'Peoples Problems',
            'post_category' => true,
            'campaign_category' => true,
        ]);
        Category::create([
            'pl_name' => 'Peoples Problems',
            'slug' => time().'-peoples-problems2',
            'sl_name' => 'Peoples Problems',
            'post_category' => true,
            'campaign_category' => true,
        ]);

    }
}
