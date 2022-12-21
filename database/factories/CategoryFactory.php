<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence(rand(1, 3));

        return [
            'name' => $name,
            'slug' => str()->slug($name),
            'parent_id' => rand(1, 10)
        ];
    }
}
