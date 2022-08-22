<?php

namespace Database\Seeders;

use App\Models\ContactUsSetting;
use Illuminate\Database\Seeder;

class ContactUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactUsSetting::create([
            
            'email' => 'info@charityzai.com',
            'phone' => '+88 012 345 789 90',
            'pl_address' => '23 Ramnogor main road, Rupsha, Khulna, Bangladesh',
            'sl_address' => '23 Ramnogor main road, Rupsha, Khulna, Bangladesh',

        ]);
    }
}
