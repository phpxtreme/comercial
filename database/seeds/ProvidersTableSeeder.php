<?php

use App\Models\Group;
use App\Repositories\ProviderRepository;
use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param ProviderRepository $providerRepository
     *
     * @return void
     */
    public function run(ProviderRepository $providerRepository)
    {
        /** @var array $providers */
        $providers = config('defaults.providers');

        array_map(function ($array) use ($providerRepository) {

            /** @var array $groups */
            $groups = $array['grupos'];

            // Remove elements from the array
            unset($array['grupos']);

            // Create Provider
            $provider = $providerRepository->create($array, true);

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
