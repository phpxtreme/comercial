<?php

use App\Models\Measurement;
use Illuminate\Database\Seeder;


class MeasurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var array $measurements */
        $measurements = config('defaults.measurements');

        array_map(function ($measurement) {
            Measurement::create([
                'name'        => $measurement['name'],
                'description' => $measurement['description'],
            ]);
        }, $measurements);
    }
}
