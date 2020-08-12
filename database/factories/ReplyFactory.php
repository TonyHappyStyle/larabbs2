<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Reply::class, function (Faker $faker) {

    $created_at_time = $faker->dateTimeThisMonth();
    $updated_at_time = $faker->dateTimeThisMonth($created_at_time);
    return [
        'content'    => $faker->sentence(),
        'created_at' => $created_at_time,
        'updated_at' => $updated_at_time,
        'user_id'    => rand(1,10),
        'topic_id'   => rand(1,100),
    ];
});
