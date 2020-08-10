<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Association;
use Faker\Generator as Faker;

$factory->define(Association::class, function (Faker $faker) {
    return [
        "position_title" => $faker->company,
        'start_date' => $faker->dateTime,
        'end_date' => $faker->dateTime,
        'salary' => rand(1000, 9999),
        'donor_id' => random_int(1, 10),
        "organization_id" => random_int(1, 10),
        'donor_association_relation_id' => random_int(1, 10),
    ];
});
