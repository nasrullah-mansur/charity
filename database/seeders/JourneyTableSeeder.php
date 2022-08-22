<?php

namespace Database\Seeders;

use App\Models\Journey;
use Illuminate\Database\Seeder;

class JourneyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Journey::create([

            'pl_first_stage_title' => '2000',
            'pl_second_stage_title' => '2005',
            'pl_third_stage_title' => '2010',
            'pl_fourth_stage_title' => '2015',
            'pl_fifth_stage_title' => '2020',

            'pl_first_stage_subtitle' => "web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.",
            'pl_second_stage_subtitle' => "web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.",
            'pl_third_stage_subtitle' => "web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.",
            'pl_fourth_stage_subtitle' => "web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.",
            'pl_fifth_stage_subtitle' => "web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.",

            'sl_first_stage_title' => '2000',
            'sl_second_stage_title' => '2005',
            'sl_third_stage_title' => '2010',
            'sl_fourth_stage_title' => '2015',
            'sl_fifth_stage_title' => '2020',

            'sl_first_stage_subtitle' => "web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.",
            'sl_second_stage_subtitle' => "web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.",
            'sl_third_stage_subtitle' => "web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.",
            'sl_fourth_stage_subtitle' => "web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.",
            'sl_fifth_stage_subtitle' => "web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.",


            'first_stage_image' => 'journey-img-1.png',
            'second_stage_image' => 'journey-img-2.png',
            'third_stage_image' => 'journey-img-3.png',
            'fourth_stage_image' => 'journey-img-4.png',
            'fifth_stage_image' => 'journey-img-5.png',

            'active_status' => true,
        ]);
    }
}
