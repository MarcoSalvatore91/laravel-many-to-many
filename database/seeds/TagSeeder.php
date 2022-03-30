<?php

use Illuminate\Database\Seeder;
use Faker\Generator;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $tags = ['Frontend', 'Backend', 'FullStack', 'Design'];

        foreach ($tags as $name) {
            $tag = new Tag();
            $tag->label = $name;
            $tag->color = $faker->hexColor();
            $tag->save();
        }
    }
}
