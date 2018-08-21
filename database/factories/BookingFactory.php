<?php

use Faker\Generator as Faker;

$factory->define(App\Booking::class, function (Faker $faker) {
    $startingDate = $faker->dateTimeBetween('this week', '+6 days');
    $endingDate   = $faker->dateTimeBetween($startingDate, strtotime('+6 days'));

    return [
        'guest' => $faker->text(20),
        'message' => $faker->text(120),
        'from_date' => $startingDate,
        'to_date' => $endingDate
    ];
});
