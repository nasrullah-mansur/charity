<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::create([
            'image' => 'partner-img-1.png',
            'link' => '',
            'active_status' => true,
        ]);

        Partner::create([
            'image' => 'partner-img-2.png',
            'link' => '',
            'active_status' => true,
        ]);

        Partner::create([
            'image' => 'partner-img-3.png',
            'link' => '',
            'active_status' => true,
        ]);

        Partner::create([
            'image' => 'partner-img-4.png',
            'link' => '',
            'active_status' => true,
        ]);
        Partner::create([
            'image' => 'partner-img-5.png',
            'link' => '',
            'active_status' => true,
        ]);
        Partner::create([
            'image' => 'partner-img-1.png',
            'link' => '',
            'active_status' => true,
        ]);
        Partner::create([
            'image' => 'partner-img-2.png',
            'link' => '',
            'active_status' => true,
        ]);
    }
}
