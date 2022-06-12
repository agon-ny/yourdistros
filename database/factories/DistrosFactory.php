<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Distros>
 */
class DistrosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->name(),
            'company' => $this->faker->company(),
            'short_description' => $this->faker->name(),
            'website' => $this->faker->url(),
            'description' => $this->faker->paragraph(3),
            'image' => null
        ];
    }
}
