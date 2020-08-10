<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Topic;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Topic::class, function (Faker $faker) {

    $sentence = $faker->sentence();

    //更改时间随机取一个月以内的时间
    $updated_at = $faker->dateTimeThisMonth();

    //创建时间也随机取一个月以内的时间，但不超过更改时间
    $created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        // 'name' => $faker->name,
        'title' => $sentence,
        'body'  => $faker->text(),
        'excerpt' => $sentence,
        'user_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
        'category_id' => $faker->randomElement([1,2,3,4]),
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
