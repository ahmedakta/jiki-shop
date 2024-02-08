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

    public function definition(): array
    {
        return [
            'language_id' => 1,
            'parent_id' => 1,
            'category_name' => $this->faker->word,
            'category_slug' => $this->faker->sentence,
            'category_desc' => $this->faker->sentence,
            'category_configs' => $this->faker->sentence,
            'status' =>1,
        ];
    }
}
