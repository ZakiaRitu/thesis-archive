<?php

use Faker\Generator as Faker;

$factory->define(\App\Paper::class, function (Faker $faker) {
    return [
        'paper_title' => $faker->sentence(5),
        'paper_abstract' => $faker->sentence(200),
        'paper_published_url' => $faker->url,
        'paper_published_at' => $faker->word,
        'paper_type' => 'CONFERENCE',
        'paper_publish_date' => $faker->dateTime('now'),
        'paper_pdf' => $faker->url,
        'paper_cite' => 'Darin Im, Minh Thao, Dang Nguyen,"Predicting Movie Success in the U.S.market," Dept.Elect.Eng, Stanford Univ.,California, December, 2011',
        'paper_meta_data' => $faker->word.$faker->randomLetter.$faker->creditCardNumber,
    ];
});
