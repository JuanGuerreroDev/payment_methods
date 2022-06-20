<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'iso' => 'usd',
            ],
            [
                'iso' =>'eur',
            ],
            [
                'iso' =>'gbp',
            ]
        ];
        Currency::insert($currencies);
    }
}
