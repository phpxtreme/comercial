<?php

use App\Models\Shipping;
use Illuminate\Database\Seeder;

class ShippingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var array $shippings */
        $shippings = config('defaults.shippings');

        array_map(function ($shipping) {
            Shipping::create([
                'name' => $shipping['name'],
            ]);
        }, $shippings);
    }
}
