<?php

use Faker\Generator as Faker;

$factory->define(\App\Profile::class, function (Faker $faker) {
    return [
        //'image' => $faker->imageUrl(230,250),
        'image' => '/images/anonymous.png',
        'phone_num' => $faker->phoneNumber,
        'interest' => $faker->word,
        'status' => 'STUDENT',
        'designation' => $faker->word,
        'reg_num' => $faker->bankAccountNumber,
        'session_year' => $faker->year,
        'bio' => $faker->sentence(100),
    ];
});
