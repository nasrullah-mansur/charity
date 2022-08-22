<?php

namespace Database\Seeders;

use App\Models\DonationSlot;
use Illuminate\Database\Seeder;

class DonationSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonationSlot::create([
            
                 'value1' => 10,
                 'value2' => 15,
                 'value3' => 20,
                 'value4' => 25,
                 'value5' => 30,
                 'value6' => 35,
                 'value7' => 40,
                 'value8' => 45,
                 'value9' => 50,
             ]);

    }
}
