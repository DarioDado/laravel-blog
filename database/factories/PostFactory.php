<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$autoIncrementPostAssets = autoIncrementPostAssets();

$factory->define(Post::class, function (Faker $faker) use ($autoIncrementPostAssets) {
    $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
    $categories = config('junior.postCategories');
    $autoIncrementPostAssets->next();
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'category_id' => $faker->numberBetween(1, count($categories)),
        'asset_id' => $autoIncrementPostAssets->current(),
        'title' => $faker->sentence(4),
        'body' => $faker->paragraph(30),
        'created_at' => $date,
        'updated_at' => $date,
    ];
});

function autoIncrementPostAssets()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}