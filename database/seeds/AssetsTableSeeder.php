<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Filesystem\Filesystem;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $filesystem = new Filesystem;
        $filesystem->cleanDirectory('storage/app/public/assets');
        for ($i=1; $i <= 30; $i++) { 
            factory(App\Asset::class, 1)->create();

            $url = $faker->imageUrl(640, 480);
            $contents = file_get_contents($url);
            $name = $i . 'example.jpg';
            $path = 'assets/' . $name;
            Storage::put($path, $contents);
        }
    }
}
