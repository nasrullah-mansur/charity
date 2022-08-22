<?php

namespace Database\Seeders;

use App\Models\HelpArea;
use Illuminate\Database\Seeder;

class HelpAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HelpArea::create([
            'pl_title' => 'We Always Where Other People Need Helps',
            'sl_title' => "Nous sommes toujours là où les autres ont besoin d'aide",

            'first_section_counter' => '16000',
            'second_section_counter' => '1294',
            'third_section_counter' => '12',
            'fourth_section_counter' => '728',



            'pl_first_section_unit' => 'KG',
            'pl_second_section_unit' => 'Volunteers',
            'pl_third_section_unit' => 'Teacher',
            'pl_fourth_section_unit' => 'mln L',

            'sl_first_section_unit' => 'KG',
            'sl_second_section_unit' => 'Bénévoles',
            'sl_third_section_unit' => 'Professeur',
            'sl_fourth_section_unit' => 'mln L',


            'pl_first_section_title' => 'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de.',
            'pl_second_section_title' => 'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de.',
            'pl_third_section_title' => 'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de.',
            'pl_fourth_section_title' => 'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de.',

            'sl_first_section_title' => 'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de.',
            'sl_second_section_title' => 'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de.',
            'sl_third_section_title' => 'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de.',
            'sl_fourth_section_title' => 'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de.',


            'first_section_icon' => 'fas fa-shopping-bag',
            'second_section_icon' => 'far fa-user',
            'third_section_icon' => 'fas fa-tint',
            'fourth_section_icon' => 'fas fa-chalkboard-teacher',
            'background_image' => 'help-bg.png',

            'active_status' => true,
        ]);
    }
}
