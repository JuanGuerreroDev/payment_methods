<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentPlatform;

class PaymentPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentPlatforms = [
            [
                'name' => 'Paypal',
                'image' => 'img/payment-platforms/paypal.jpg'
            ],
            [
                'name' => 'Stripe',
                'image' => 'img/payment-platforms/stripe.jpg'
            ]
        ];
        PaymentPlatform::insert($paymentPlatforms);
    }
}
