<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['js', 'vue', 'react', 'angular', 'laravel', 'node', 'C#'];

        foreach ($technologies as $technology_name) {

            $technology = new Technology();
            $technology->name = $technology_name;
            $technology->slug = Str::slug($technology_name);
            $technology->save();
        }
    }
}
