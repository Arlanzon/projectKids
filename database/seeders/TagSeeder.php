<?php

namespace Database\Seeders;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{ 
   use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create(['name' => 'Laravel',    'codigo' => 'LAR']);
        Tag::create(['name' => 'PHP',        'codigo' => 'PHP']);
        Tag::create(['name' => 'JavaScript', 'codigo' => 'JS']);
        Tag::create(['name' => 'VueJS',      'codigo' => 'VUE']);
        Tag::create(['name' => 'React',      'codigo' => 'REACT']);
    }
}
