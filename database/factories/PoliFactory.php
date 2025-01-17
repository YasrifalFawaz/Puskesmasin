<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poli>
 */
class PoliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_poli' => $this->faker->randomElement(['Gigi', 'Umum', 'Anak']),
            'biaya' => $this->faker->numberBetween(80000, 120000),
            'keterangan' => $this->faker->text(),
        ];
    }
}
