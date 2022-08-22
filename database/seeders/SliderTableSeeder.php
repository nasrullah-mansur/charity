<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'pl_title' => 'Peoples are waiting for food & shelter & Good Lives.',
            'sl_title' => 'Les gens attendent de la nourriture, un abri et de bonnes vies.',
            'pl_subtitle' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.',
            'sl_subtitle' => "C'est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible d'une page lorsqu'il regarde sa mise en page. L'intérêt d'utiliser Lorem Ipsum est qu'il a une distribution plus ou moins normale des lettres, par opposition à l'utilisation.",
            'image' => 'banner-img.png',
            'campaign_id' => 1,
            'active_status' => true
        ]);

        Slider::create([
            'pl_title' => 'Peoples are waiting for food & shelter & Good Lives.',
            'sl_title' => 'Les gens attendent de la nourriture, un abri et de bonnes vies.',
            'pl_subtitle' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.',
            'sl_subtitle' => "C'est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible d'une page lorsqu'il regarde sa mise en page. L'intérêt d'utiliser Lorem Ipsum est qu'il a une distribution plus ou moins normale des lettres, par opposition à l'utilisation.",
            'image' => 'banner-img.png',
            'campaign_id' => 2,
            'active_status' => true
        ]);

        Slider::create([
            'pl_title' => 'Peoples are waiting for food & shelter & Good Lives.',
            'sl_title' => 'Les gens attendent de la nourriture, un abri et de bonnes vies.',
            'pl_subtitle' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.',
            'sl_subtitle' => "C'est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible d'une page lorsqu'il regarde sa mise en page. L'intérêt d'utiliser Lorem Ipsum est qu'il a une distribution plus ou moins normale des lettres, par opposition à l'utilisation.",
            'image' => 'banner-img.png',
            'campaign_id' => 3,
            'active_status' => true
        ]);
    }
}
