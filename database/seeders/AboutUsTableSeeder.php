<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'pl_title' => 'There are many variations of passages of the Lorem Ipsum available, but the majority of have suffered.',
            'sl_title' => "Il existe de nombreuses variantes de passages du Lorem Ipsum disponibles, mais la majorité ont souffert.",
            'pl_about_us' => " <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like.</p>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>",
            'sl_about_us' => "<p> C'est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible d'une page lorsqu'il regarde sa mise en page. L'intérêt d'utiliser Lorem Ipsum est qu'il a une distribution plus ou moins normale des lettres, par opposition à l'utilisation de `` Contenu ici, contenu ici '', ce qui le fait ressembler à un anglais lisible. De nombreux progiciels de publication assistée par ordinateur et éditeurs de pages Web utilisent désormais Lorem Ipsum comme modèle de texte par défaut, et une recherche sur «lorem ipsum» permettra de découvrir de nombreux sites Web encore à leurs balbutiements. Différentes versions ont évolué au fil des ans, parfois par accident, parfois volontairement (humour injecté, etc.
            <p> C'est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible d'une page lorsqu'il regarde sa mise en page. L'intérêt d'utiliser Lorem Ipsum est qu'il a une distribution plus ou moins normale des lettres, par opposition à l'utilisation de `` Contenu ici, contenu ici '', ce qui le fait ressembler à un anglais lisible. De nombreux progiciels de publication assistée par ordinateur et éditeurs de pages Web utilisent désormais Lorem Ipsum comme modèle de texte par défaut, et une recherche sur «lorem ipsum» permettra de découvrir de nombreux sites Web encore à leurs balbutiements. Différentes versions ont évolué au fil des ans, parfois par accident, parfois volontairement (humour injecté, etc.). </p>",
            'image' => 'about-img.png',
        ]);
    }
}
