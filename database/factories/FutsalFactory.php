<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Futsal>
 */
class FutsalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,  // Mengatur user_id menjadi 1
            'name' => $this->faker->company,
            'image' => $this->faker->imageUrl(640, 480, 'sports', true, 'futsal'),
            'link' => $this->faker->url,
            'description' => $this->faker->paragraph,
        ];
    }
}
