<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieSeeder extends Seeder
{
    
    public function run()
    {
        Film::create([
            'title' => 'Puss in Boots',
            'release_date' => '28-12-2022',
            'genre' => 'Action, Adventure, Fantasy',
        ]);
    }
}
