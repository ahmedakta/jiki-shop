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
    public function definition(): array
    {
        return [
            'language_id' => 1,
            'category_id' => 4,
            'currency_id' => 1,
            'product_title' => $this->faker->word,
            'product_introduction' => $this->faker->paragraph(1),
            'product_desc' => $this->faker->paragraph(5),
            'product_keywords' => $this->faker->word,
            'product_configs' => "[{'test':'hi'}]",
            'product_price' => $this->faker->randomFloat(2, 10, 1000),
            'status' => 1,
        ];
    }
}
