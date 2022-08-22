<?php

namespace Database\Seeders;

use App\Models\GeneralSettings;
use Illuminate\Database\Seeder;

class GeneralSettingsTablSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSettings::create(['slug' => 'title', 'value' => 'Welcome To chartyzai']);
        GeneralSettings::create(['slug' => 'company_name', 'value' => 'chartyzai']);
        GeneralSettings::create(['slug' => 'logo', 'value' => 'logo.png']);
        GeneralSettings::create(['slug' => 'footer_logo', 'value' => 'logo-2.png']);
        GeneralSettings::create(['slug' => 'fav_icon', 'value' => 'favicon.ico']);
        GeneralSettings::create(['slug' => 'meta_keywords', 'value' => 'business,corporate, creative, woocommerach, design, gallery, minimal, modern, landing page, cv, designer, freelancer, html, one page, personal, portfolio, programmer, responsive, vcard, one page']);
        GeneralSettings::create(['slug' => 'meta_author', 'value' => 'chartyzai']);
        GeneralSettings::create(['slug' => 'meta_description', 'value' => 'chartyzai Responsive  HTML5 Template']);
        GeneralSettings::create(['slug' => 'currency', 'value' => '$']);
        GeneralSettings::create(['slug' => 'currency_name', 'value' => 'USD']);
        GeneralSettings::create(['slug' => 'pl_about_us', 'value' => 'Pl Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fermentum uismod']);
        GeneralSettings::create(['slug' => 'sl_about_us', 'value' => 'Sl Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fermentum uismod']);

        GeneralSettings::create(['slug' => 'facebook', 'value' => 'https://www.facebook.com/']);
        GeneralSettings::create(['slug' => 'twitter', 'value' => 'https://www.twitter.com/']);
        GeneralSettings::create(['slug' => 'linkedin', 'value' => 'https://www.linkedin.com/']);
        GeneralSettings::create(['slug' => 'pinterest', 'value' => 'https://www.pinterest.com/']);
        GeneralSettings::create(['slug' => 'skype', 'value' => '']);


        GeneralSettings::create(['slug' => 'tax', 'value' => '5']);
        GeneralSettings::create(['slug' => 'shipping_charge', 'value' => '50']);

        GeneralSettings::create(['slug' => 'pl', 'value' => PRIMARY_LANGUAGE ]);
        GeneralSettings::create(['slug' => 'pl_flag', 'value' => null ]);

        GeneralSettings::create(['slug' => 'sl', 'value' => SECONDARY_LANGUAGE ]);
        GeneralSettings::create(['slug' => 'sl_flag', 'value' =>'french.png']);

        GeneralSettings::create(['slug' => 'password_image', 'value' =>'password_image.jpg']);
        GeneralSettings::create(['slug' => 'signup_image', 'value' => path_image().'sign-up-img.png' ]);
        GeneralSettings::create(['slug' => 'signin_image', 'value' => path_image().'log-in-img.png' ]);

    }

}
