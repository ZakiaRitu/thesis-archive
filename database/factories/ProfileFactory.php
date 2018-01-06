<?php

use Faker\Generator as Faker;

$factory->define(\App\Profile::class, function (Faker $faker) {
    return [
        //'image' => $faker->imageUrl(230,250),
        'phone_num' => $faker->phoneNumber,
        'interest' => $faker->word,
        'status' => 'STUDENT',
        'designation' => $faker->word,
        'reg_num' => $faker->bankAccountNumber,
        'session' => $faker->year,
    ];
});
