<?php

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var array $currencies */
        $currencies = config('defaults.currencies');

        array_map(function ($currency) {
            Currency::create([
                'name' => $currency['name'],
            ]);
        }, $currencies);
    }
}
