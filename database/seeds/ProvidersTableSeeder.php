<?php

use App\Models\Group;
use App\Models\Item;
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
            $groups = $array['groups'];

            // Remove elements from the array
            unset($array['groups']);

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

                // Associate Items to Group
                if (array_key_exists('items', $group)) {
                    foreach ($group['items'] as $item) {
                        Item::create([
                            'group_id'       => $newGroup->id,
                            'quantity'       => $item['quantity'],
                            'measurement_id' => $item['measurement'],
                            'currency_id'    => $item['currency'],
                            'description'    => $item['description'],
                            'model'          => $item['model'],
                            'price'          => $item['price'],
                        ]);
                    }
                }
            }
        }, $providers);
    }
}
