<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campaign::create([
            'user_id' => 1,
            'category_id' => 1,
            'pl_title' => 'Rohinga Child Education',
            'slug' => time().'-'.'rohinga-child-education-1',
            'sl_title' => 'Éducation des enfants Rohinga',

            'pl_details' => '<p>There are many variations of Lorem Ipsum passages available, but the majority have suffered from alterations in one form or another, from injected humor or randomly chosen words that do not seem half believable. If you are going to use a passage from Lorum Ipsum, make sure there is nothing embarrassing hidden in the middle of the text.</p><p>All Lorum Ipsum generators on the Internet have the ability to repeat predefined parts where necessary so that this is the first real generator on the Internet. It uses a glossary of 200 Latin words combined with a handful of sentence structure models to generate a Lorum Ipsum that appears reasonable.</p>',
            'sl_details' =>"<p>Il existe de nombreuses variantes de passages du Lorem Ipsum disponibles, mais la majorité ont subi des altérations sous une forme ou une autre, à cause de l'humour injecté ou de mots choisis au hasard qui ne semblent pas à moitié crédibles. Si vous comptez utiliser un passage de Lorum Ipsum, assurez-vous qu'il n'y a rien d'embarrassant caché au milieu du texte.</p><p>Tous les générateurs Lorum Ipsum sur Internet ont la possibilité de répéter des parties prédéfinies si nécessaire afin que ce soit le premier véritable générateur sur Internet. Il utilise un glossaire de 200 mots latins combinés à une poignée de modèles de structure de phrases pour générer un Lorum Ipsum qui semble raisonnable.</p>",

            'goal_amount' => 5000,
            'raised_amount' => 5001,
            'address' => 'sonadanga, khulna',
            'image' => 'campaign-img-1.png',
            'start_date' => Carbon::now()->toDateString(),
            'end_date' => Carbon::now()->add(10, 'day'),
            'is_approved' => true,
            'end_with_goal_achieve' => true,
            'status' => CAMPAIGN_COMPLETED,
        ]);

        Campaign::create([
            'user_id' => 1,
            'category_id' => 2,
            'pl_title' => 'Rohinga Child Education',
            'slug' => time().'-'.'rohinga-child-education-2',
            'sl_title' => 'Éducation des enfants Rohinga',

            'pl_details' => '<p>There are many variations of Lorem Ipsum passages available, but the majority have suffered from alterations in one form or another, from injected humor or randomly chosen words that do not seem half believable. If you are going to use a passage from Lorum Ipsum, make sure there is nothing embarrassing hidden in the middle of the text.</p><p>All Lorum Ipsum generators on the Internet have the ability to repeat predefined parts where necessary so that this is the first real generator on the Internet. It uses a glossary of 200 Latin words combined with a handful of sentence structure models to generate a Lorum Ipsum that appears reasonable.</p>',
            'sl_details' =>"<p>Il existe de nombreuses variantes de passages du Lorem Ipsum disponibles, mais la majorité ont subi des altérations sous une forme ou une autre, à cause de l'humour injecté ou de mots choisis au hasard qui ne semblent pas à moitié crédibles. Si vous comptez utiliser un passage de Lorum Ipsum, assurez-vous qu'il n'y a rien d'embarrassant caché au milieu du texte.</p><p>Tous les générateurs Lorum Ipsum sur Internet ont la possibilité de répéter des parties prédéfinies si nécessaire afin que ce soit le premier véritable générateur sur Internet. Il utilise un glossaire de 200 mots latins combinés à une poignée de modèles de structure de phrases pour générer un Lorum Ipsum qui semble raisonnable.</p>",

            'goal_amount' => 6000,
            'prefillable_amount' => 500,
            'raised_amount' => 2860,
            'address' => 'sonadanga, khulna',
            'image' => 'campaign-img-2.png',
            'start_date' => Carbon::now()->toDateString(),
            'end_date' => Carbon::now()->add(7, 'day'),
            'is_approved' => true,
            'status' => CAMPAIGN_RUNNING,
        ]);

        Campaign::create([
            'user_id' => 1,
            'category_id' => 3,
            'pl_title' => 'Rohinga Child Education',
            'slug' => time().'-'.'rohinga-child-education-3',
            'sl_title' => 'Éducation des enfants Rohinga',

            'pl_details' => '<p>There are many variations of Lorem Ipsum passages available, but the majority have suffered from alterations in one form or another, from injected humor or randomly chosen words that do not seem half believable. If you are going to use a passage from Lorum Ipsum, make sure there is nothing embarrassing hidden in the middle of the text.</p><p>All Lorum Ipsum generators on the Internet have the ability to repeat predefined parts where necessary so that this is the first real generator on the Internet. It uses a glossary of 200 Latin words combined with a handful of sentence structure models to generate a Lorum Ipsum that appears reasonable.</p>',
            'sl_details' =>"<p>Il existe de nombreuses variantes de passages du Lorem Ipsum disponibles, mais la majorité ont subi des altérations sous une forme ou une autre, à cause de l'humour injecté ou de mots choisis au hasard qui ne semblent pas à moitié crédibles. Si vous comptez utiliser un passage de Lorum Ipsum, assurez-vous qu'il n'y a rien d'embarrassant caché au milieu du texte.</p><p>Tous les générateurs Lorum Ipsum sur Internet ont la possibilité de répéter des parties prédéfinies si nécessaire afin que ce soit le premier véritable générateur sur Internet. Il utilise un glossaire de 200 mots latins combinés à une poignée de modèles de structure de phrases pour générer un Lorum Ipsum qui semble raisonnable.</p>",

            'goal_amount' => 3000,
            'prefillable_amount' => 500,
            'raised_amount' => 2860,
            'address' => 'sonadanga, khulna',
            'image' => 'campaign-img-3.png',
            'start_date' => Carbon::now()->toDateString(),
            'end_date' => Carbon::now()->add(5, 'day'),
            'is_approved' => true,
            'status' => CAMPAIGN_RUNNING,
        ]);
        Campaign::create([
            'user_id' => 1,
            'category_id' => 4,
            'pl_title' => 'Rohinga Child Education',
            'slug' => time().'-'.'rohinga-child-education-4',
            'sl_title' => 'Éducation des enfants Rohinga',

            'pl_details' => '<p>There are many variations of Lorem Ipsum passages available, but the majority have suffered from alterations in one form or another, from injected humor or randomly chosen words that do not seem half believable. If you are going to use a passage from Lorum Ipsum, make sure there is nothing embarrassing hidden in the middle of the text.</p><p>All Lorum Ipsum generators on the Internet have the ability to repeat predefined parts where necessary so that this is the first real generator on the Internet. It uses a glossary of 200 Latin words combined with a handful of sentence structure models to generate a Lorum Ipsum that appears reasonable.</p>',
            'sl_details' =>"<p>Il existe de nombreuses variantes de passages du Lorem Ipsum disponibles, mais la majorité ont subi des altérations sous une forme ou une autre, à cause de l'humour injecté ou de mots choisis au hasard qui ne semblent pas à moitié crédibles. Si vous comptez utiliser un passage de Lorum Ipsum, assurez-vous qu'il n'y a rien d'embarrassant caché au milieu du texte.</p><p>Tous les générateurs Lorum Ipsum sur Internet ont la possibilité de répéter des parties prédéfinies si nécessaire afin que ce soit le premier véritable générateur sur Internet. Il utilise un glossaire de 200 mots latins combinés à une poignée de modèles de structure de phrases pour générer un Lorum Ipsum qui semble raisonnable.</p>",

            'goal_amount' => 10000,
            'prefillable_amount' => 500,
            'raised_amount' => 2860,
            'address' => 'sonadanga, khulna',
            'image' => 'campaign-img-4.png',
            'start_date' => Carbon::now()->toDateString(),
            'end_date' => Carbon::now()->add(20, 'day'),
            'is_approved' => true,
            'status' => CAMPAIGN_RUNNING,
        ]);
        Campaign::create([
            'user_id' => 1,
            'category_id' => 1,
            'pl_title' => 'Rohinga Child Education',
            'slug' => time().'-'.'rohinga-child-education-5',
            'sl_title' => 'Éducation des enfants Rohinga',

            'pl_details' => '<p>There are many variations of Lorem Ipsum passages available, but the majority have suffered from alterations in one form or another, from injected humor or randomly chosen words that do not seem half believable. If you are going to use a passage from Lorum Ipsum, make sure there is nothing embarrassing hidden in the middle of the text.</p><p>All Lorum Ipsum generators on the Internet have the ability to repeat predefined parts where necessary so that this is the first real generator on the Internet. It uses a glossary of 200 Latin words combined with a handful of sentence structure models to generate a Lorum Ipsum that appears reasonable.</p>',
            'sl_details' =>"<p>Il existe de nombreuses variantes de passages du Lorem Ipsum disponibles, mais la majorité ont subi des altérations sous une forme ou une autre, à cause de l'humour injecté ou de mots choisis au hasard qui ne semblent pas à moitié crédibles. Si vous comptez utiliser un passage de Lorum Ipsum, assurez-vous qu'il n'y a rien d'embarrassant caché au milieu du texte.</p><p>Tous les générateurs Lorum Ipsum sur Internet ont la possibilité de répéter des parties prédéfinies si nécessaire afin que ce soit le premier véritable générateur sur Internet. Il utilise un glossaire de 200 mots latins combinés à une poignée de modèles de structure de phrases pour générer un Lorum Ipsum qui semble raisonnable.</p>",

            'goal_amount' => 5000,
            'prefillable_amount' => 500,
            'raised_amount' => 2860,
            'address' => 'sonadanga, khulna',
            'image' => 'campaign-img-5.png',
            'start_date' => Carbon::now()->toDateString(),
            'end_date' => Carbon::now()->add(10, 'day'),
            'is_approved' => true,
            'status' => CAMPAIGN_RUNNING,
        ]);
        Campaign::create([
            'user_id' => 1,
            'category_id' => 1,
            'pl_title' => 'Rohinga Child Education',
            'slug' => time().'-'.'rohinga-child-education-6',
            'sl_title' => 'Éducation des enfants Rohinga',

            'pl_details' => '<p>There are many variations of Lorem Ipsum passages available, but the majority have suffered from alterations in one form or another, from injected humor or randomly chosen words that do not seem half believable. If you are going to use a passage from Lorum Ipsum, make sure there is nothing embarrassing hidden in the middle of the text.</p><p>All Lorum Ipsum generators on the Internet have the ability to repeat predefined parts where necessary so that this is the first real generator on the Internet. It uses a glossary of 200 Latin words combined with a handful of sentence structure models to generate a Lorum Ipsum that appears reasonable.</p>',
            'sl_details' =>"<p>Il existe de nombreuses variantes de passages du Lorem Ipsum disponibles, mais la majorité ont subi des altérations sous une forme ou une autre, à cause de l'humour injecté ou de mots choisis au hasard qui ne semblent pas à moitié crédibles. Si vous comptez utiliser un passage de Lorum Ipsum, assurez-vous qu'il n'y a rien d'embarrassant caché au milieu du texte.</p><p>Tous les générateurs Lorum Ipsum sur Internet ont la possibilité de répéter des parties prédéfinies si nécessaire afin que ce soit le premier véritable générateur sur Internet. Il utilise un glossaire de 200 mots latins combinés à une poignée de modèles de structure de phrases pour générer un Lorum Ipsum qui semble raisonnable.</p>",

            'goal_amount' => 5000,
            'prefillable_amount' => 500,
            'raised_amount' => 500,
            'address' => 'sonadanga, khulna',
            'image' => 'campaign-img-1.png',
            'start_date' => Carbon::now()->toDateString(),
            'end_date' => Carbon::now()->add(10, 'day'),
            'is_approved' => true,
            'end_with_goal_achieve' => true,
            'status' => CAMPAIGN_RUNNING,
        ]);
        Campaign::create([
            'user_id' => 1,
            'category_id' => 1,
            'pl_title' => 'Rohinga Child Education',
            'slug' => time().'-'.'rohinga-child-education-7',
            'sl_title' => 'Éducation des enfants Rohinga',

            'pl_details' => '<p>There are many variations of Lorem Ipsum passages available, but the majority have suffered from alterations in one form or another, from injected humor or randomly chosen words that do not seem half believable. If you are going to use a passage from Lorum Ipsum, make sure there is nothing embarrassing hidden in the middle of the text.</p><p>All Lorum Ipsum generators on the Internet have the ability to repeat predefined parts where necessary so that this is the first real generator on the Internet. It uses a glossary of 200 Latin words combined with a handful of sentence structure models to generate a Lorum Ipsum that appears reasonable.</p>',
            'sl_details' =>"<p>Il existe de nombreuses variantes de passages du Lorem Ipsum disponibles, mais la majorité ont subi des altérations sous une forme ou une autre, à cause de l'humour injecté ou de mots choisis au hasard qui ne semblent pas à moitié crédibles. Si vous comptez utiliser un passage de Lorum Ipsum, assurez-vous qu'il n'y a rien d'embarrassant caché au milieu du texte.</p><p>Tous les générateurs Lorum Ipsum sur Internet ont la possibilité de répéter des parties prédéfinies si nécessaire afin que ce soit le premier véritable générateur sur Internet. Il utilise un glossaire de 200 mots latins combinés à une poignée de modèles de structure de phrases pour générer un Lorum Ipsum qui semble raisonnable.</p>",

            'goal_amount' => 5000,
            'prefillable_amount' => 500,
            'raised_amount' => 500,
            'address' => 'sonadanga, khulna',
            'image' => 'campaign-img-1.png',
            'start_date' => Carbon::now()->toDateString(),
            'end_date' => Carbon::now()->add(10, 'day'),
            'is_approved' => true,
            'end_with_goal_achieve' => true,
            'status' => CAMPAIGN_RUNNING,
        ]);

        Campaign::create([
            'user_id' => 1,
            'category_id' => 2,
            'pl_title' => 'Rohinga Child Education',
            'slug' => time().'-'.'rohinga-child-education-8',
            'sl_title' => 'Éducation des enfants Rohinga',

            'pl_details' => '<p>There are many variations of Lorem Ipsum passages available, but the majority have suffered from alterations in one form or another, from injected humor or randomly chosen words that do not seem half believable. If you are going to use a passage from Lorum Ipsum, make sure there is nothing embarrassing hidden in the middle of the text.</p><p>All Lorum Ipsum generators on the Internet have the ability to repeat predefined parts where necessary so that this is the first real generator on the Internet. It uses a glossary of 200 Latin words combined with a handful of sentence structure models to generate a Lorum Ipsum that appears reasonable.</p>',
            'sl_details' =>"<p>Il existe de nombreuses variantes de passages du Lorem Ipsum disponibles, mais la majorité ont subi des altérations sous une forme ou une autre, à cause de l'humour injecté ou de mots choisis au hasard qui ne semblent pas à moitié crédibles. Si vous comptez utiliser un passage de Lorum Ipsum, assurez-vous qu'il n'y a rien d'embarrassant caché au milieu du texte.</p><p>Tous les générateurs Lorum Ipsum sur Internet ont la possibilité de répéter des parties prédéfinies si nécessaire afin que ce soit le premier véritable générateur sur Internet. Il utilise un glossaire de 200 mots latins combinés à une poignée de modèles de structure de phrases pour générer un Lorum Ipsum qui semble raisonnable.</p>",

            'goal_amount' => 6000,
            'prefillable_amount' => 500,
            'raised_amount' => 2860,
            'address' => 'sonadanga, khulna',
            'image' => 'campaign-img-2.png',
            'start_date' => Carbon::now()->toDateString(),
            'end_date' => Carbon::now()->add(7, 'day'),
            'is_approved' => true,
            'status' => CAMPAIGN_RUNNING,
        ]);

    }
}
