<?php

use App\Models\Group;
use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Provider $provider
     *
     * @return void
     */
    public function run(Provider $provider)
    {
        /** @var array $providers */
        $providers = config('defaults.providers');

        array_map(function ($array) use ($provider) {

            /** @var array $groups */
            $groups = $array['grupos'];

            // Remove elements from the array
            unset($array['grupos']);

            // Create Provider
            $provider = $provider->create($array, true);

            // Associate Groups
            foreach ($groups as $group) {

                /** @var object $newGroup */
                $newGroup = Group::create([
                    'name'        => $group['name'],
                    'price'       => $group['price'],
                    'provider_id' => $provider->id,
                ]);
            }
        }, $providers);
    }
}
