<?php

namespace Database\Seeders;

use App\Models\PaymentPlatform;
use Illuminate\Database\Seeder;

class PaymentPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentPlatform::create([
            'name' => 'Paypal',
            'image' => 'payment/paypal.png'
        ]);

        PaymentPlatform::create([
            'name' => 'Stripe',
            'image' => 'payment/stripe.png'
        ]);
    }
}
