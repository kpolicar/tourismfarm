<?php

use Faker\Generator as Faker;

$factory->define(App\Inquiry::class, function (Faker $faker) {
    $duration = $faker->numberBetween(0, 10);
    $from = $faker->dateTime();
    $to = $from->add(new DateInterval("P{$duration}D"));

    return [
        'name' => $faker->name(),
        'email' => $faker->email(),
        'adults' => $faker->numberBetween(1, 8),
        'children' => $faker->numberBetween(0, 4),
        'infants' => $faker->numberBetween(0, 2),
        'from' => $from->format('Y-m-d'),
        'to' => $to->format('Y-m-d'),
        'price' => 100,
    ];
});
