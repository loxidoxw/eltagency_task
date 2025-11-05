<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Person;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags =  Tag::factory(10)->create();

        $people = Person::factory(10)->create();

        Film::factory(5)->create()->each(function ($film) use ($tags, $people) {
            $film->tags()->attach($tags->random(3));
            $film->people()->attach($people->random(3));
        });
    }
}
