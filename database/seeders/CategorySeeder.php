<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Technology',
            'slug' => 'technology',
            'color' => 'bg-red-200',
        ]);
        Category::create([
            'name' => 'Medicine',
            'slug' => 'medicine',
            'color' => 'bg-green-200',
        ]);
        Category::create([
            'name' => 'Artificial Intelligence',
            'slug' => 'ai',
            'color' => 'bg-blue-200',
        ]);
    }
}
