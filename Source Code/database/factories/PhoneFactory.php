<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = fake()->randomNumber(fake()->numberBetween(4, 5));
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(2),
            'brand' => fake()->numberBetween(1, 10),
            'model' => fake()->words(2, true),
            'ram' => fake()->numberBetween(1, 5),
            'storage_capacity' => fake()->numberBetween(1, 5),
            'main_image' => fake()->imageUrl(),
            'price' => $price,
            'color' => fake()->safeColorName(),
            'additional_images' => json_encode([
                fake()->imageUrl(),
                fake()->imageUrl(),
                fake()->imageUrl(),
                fake()->imageUrl(),
            ]),
            'user_id' => fake()->numberBetween(1, 100),
        ];
    }
}
