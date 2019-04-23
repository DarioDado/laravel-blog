<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'title' => $faker->sentence(4),
        'body' => $faker->paragraph(30),
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
