<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Studio;
use Faker\Generator as Faker;
use Faker\Provider\Address;

$factory->define(Studio::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->unique()->randomFloat(0,20,100),
        'time_24hours' => $faker->randomElement([1, 0]),
        'street' => $faker->streetAddress,
        'city' => $faker->randomElement(['Berlin', 'Frankfurt', 'Chemnitz', 'Hamburg', 'Cottbus']),
        'postal_code' => Address::postcode(),
        'coaching' => $faker->randomElement(['no', 'weekend', 'weekdays', 'yes']),
        'shower' => $faker->randomElement(['free', 'fee', 'no']),
        'contract' => $faker->randomElement(['24m', '12m', '1m']),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
