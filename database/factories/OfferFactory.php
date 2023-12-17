<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1, 5),
            'offer_title' => $this->faker->word,
            'offer_desc' => $this->faker->paragraph,
            'offer_configs' => "[{'test':'hi'}]",
            'status' => 1,
        ];
    }
}
