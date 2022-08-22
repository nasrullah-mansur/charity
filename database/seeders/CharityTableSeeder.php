<?php

namespace Database\Seeders;

use App\Models\Charity;
use Illuminate\Database\Seeder;

class CharityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Charity::create([
            'pl_title_01' => 'Community Help',
            'pl_subtitle_01' => 'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de layout   van een pagina, afgeleid wordt.',
            'sl_title_01' => 'Aide communautaire',
            'sl_subtitle_01' => "C'est un fait connu depuis un certain temps qu'un lecteur est distrait lors de la visualisation de la mise en page d'une page.",

            'pl_title_02' => 'Refugee Help',
            'pl_subtitle_02' => 'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de layout   van een pagina, afgeleid wordt.',
            'sl_title_02' => 'Aide aux réfugiés',
            'sl_subtitle_02' => "C'est un fait connu depuis un certain temps qu'un lecteur est distrait lors de la visualisation de la mise en page d'une page.",

            'pl_title_03' => 'Sanitation Help',
            'pl_subtitle_03' => 'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de layout   van een pagina, afgeleid wordt.',
            'sl_title_03' => "Aide à l'assainissement",
            'sl_subtitle_03' => "C'est un fait connu depuis un certain temps qu'un lecteur est distrait lors de la visualisation de la mise en page d'une page.",

            'pl_title_04' => 'Education Help',
            'pl_subtitle_04' => 'Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de layout   van een pagina, afgeleid wordt.',
            'sl_title_04' => "Aide à l'éducation",
            'sl_subtitle_04' => "C'est un fait connu depuis un certain temps qu'un lecteur est distrait lors de la visualisation de la mise en page d'une page.",

            'image' => 'assistence-bottom-bg.png',
        ]);
    }
}
