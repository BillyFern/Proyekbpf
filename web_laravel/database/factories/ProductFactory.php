<?php

namespace Database\Factories;

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
            'product_name' => $this->faker->unique->word(),
            'category' => $this->faker->randomElement(['Kursi', 'Meja', 'Karpet']),
            'price' => $this->faker->numberBetween($min = 3000, $max = 90000),
            'status' => "tidak habis",
            'file_name' => $this->faker->imageUrl(550, 700)
        ];
    }
}
