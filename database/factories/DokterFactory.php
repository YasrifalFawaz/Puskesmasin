<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'umur' => $this->faker->numberBetween(10, 50),
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'email' => $this->faker->email(),
        ];
    }
}
