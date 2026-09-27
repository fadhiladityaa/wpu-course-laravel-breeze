<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Web Programming',
                'slug' => 'web-programming',
                'color' => 'bg-sky-300'

            ],
            [
                'name' => 'Artificial Intelligence',
                'slug' => 'artificial-intelligence',
                'color' => 'bg-cyan-200'

            ],
            [
                'name' => 'Robotics',
                'slug' => 'robotics',
                'color' => 'bg-violet-300'
            ],
            [
                'name' => 'Machine Learning',
                'slug' => 'machine-learning',
                'color' => 'bg-rose-200'
            ],
        ]);
    }
}
