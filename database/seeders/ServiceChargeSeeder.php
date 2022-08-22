<?php

namespace Database\Seeders;

use App\Models\ServiceCharge;
use Illuminate\Database\Seeder;

class ServiceChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceCharge::create([
            'value' => 5,
            'is_percentage' => true,
        ]);
    }
}
