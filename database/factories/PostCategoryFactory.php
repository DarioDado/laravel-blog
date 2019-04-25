<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\PostCategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$categories = config('junior.postCategories');
$categoryGenerator = categoryGenerator($categories);

$factory->define(PostCategory::class, function () use ($categoryGenerator, $categories) {
    $categoryGenerator->next();
    return [
        'name' => $categories[$categoryGenerator->current()],
        'slug' => Str::slug($categories[$categoryGenerator->current()], '-'),
    ];
});

function categoryGenerator ($categories)
{  
    for ($i = 0; $i <= count($categories); $i++) {
        yield $i - 1;
    }
}
