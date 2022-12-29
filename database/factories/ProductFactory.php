<?php

namespace Database\Factories;

use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->sentence(rand(1, 3)),
            'slug' => str()->slug($name),
            'content' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(),
            'status' => ProductStatus::PUBLISHED
        ];
    }
}
