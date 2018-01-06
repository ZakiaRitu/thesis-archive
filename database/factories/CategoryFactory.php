<?php

use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->word,
        'cat_meta_data' => $faker->word.$faker->randomLetter.$faker->creditCardNumber,
    ];
});
