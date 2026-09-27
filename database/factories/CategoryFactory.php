<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $slug_of_name = fake()->sentence(rand(3, 5));
        return [
            'name' => $slug_of_name,
            'slug' => Str::of($slug_of_name)->slug('-'),
        ];
    }
}
