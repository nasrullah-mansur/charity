<?php

namespace Database\Seeders;

use App\Models\Charity;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       $this->call(TranslationTableSeeder::class);
       $this->call(GeneralSettingsTablSeeder::class);
       $this->call(AdminTablSeeder::class);
       $this->call(ContactUsTableSeeder::class);
       $this->call(SliderTableSeeder::class);
       $this->call(CharityTableSeeder::class);
       $this->call(TeamMemberTableSeeder::class);
       $this->call(DonarFeedbackTableSeeder::class);
       $this->call(CategoryTableSeeder::class);
       $this->call(TagTableSeeder::class);
       $this->call(BlogTableSeeder::class);
       $this->call(BLogTagTableSeeder::class);
       $this->call(PartnerTagTableSeeder::class);
       $this->call(AboutUsTableSeeder::class);
       $this->call(JourneyTableSeeder::class);
       $this->call(HelpAreaSeeder::class);
       $this->call(UserSeeder::class);
       $this->call(CampaignSeeder::class);
       $this->call(ServiceChargeSeeder::class);
       $this->call(DonationSlotSeeder::class);
       $this->call(PaymentPlatformsTableSeeder::class);
       $this->call(CurrenciesTableSeeder::class);
    }
}
