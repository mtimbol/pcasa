<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    return [
        'country' => 'UAE',
        'city' => 'Dubai',
        'area' => null,
        'developer' => 'NAKHEEL',
        'community' => 'Al Furjan',
        'subcommunity' => null,
        'salutation' => 'MR',
        'full_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'mobile' => '0568201789',
        'phone' => '02 820 7189',
        'fax' => '02 820 7189',
        'property_number' => null,
        'property_type' => null,
        'client_type' => 'Buyer',
        'notes' => null,
    ];
});
