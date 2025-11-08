<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Person;
use App\Models\Screenshot;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)->create();

        $tags =  Tag::factory(10)->create();

        $people = Person::factory(10)->create();

        Film::factory(5)->create()->each(function ($film) use ($tags, $people) {
            $film->tags()->attach($tags->random(3));

            Screenshot::factory(2)->create(['film_id' => $film->id]);

            $film->people()->attach(
                collect($people->random(5))->pluck('id')->toArray(),
                ['role' => 'actor']
            );

            $film->people()->attach(
                collect($people->random(1))->pluck('id')->toArray(),
                ['role' => 'director']
            );

            $film->people()->attach(
                collect($people->random(1))->pluck('id')->toArray(),
                ['role' => 'writer']
            );
        });
    }
}
