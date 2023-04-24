<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'album_name' => $this->faker->text(10),
            'album_thumb' => $this->faker->imageUrl(),
            'description' => $this->faker->text(128),
            'user_id' => User::factory(),
        ];
    }
}
