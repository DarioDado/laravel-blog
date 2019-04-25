<?php

use Illuminate\Database\Seeder;

class PostCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('junior.postCategories');
        $number = count($categories);
        factory(App\PostCategory::class, $number)->create();
    }
}
