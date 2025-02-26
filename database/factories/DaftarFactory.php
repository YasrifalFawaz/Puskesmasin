<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Daftar>
 */
class DaftarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idUser = \App\Models\User::pluck('id')->toArray();
        $idPoli = \App\Models\Poli::pluck('id')->toArray();
        $idDokter = \App\Models\Dokter::pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($idUser),
            'tanggal_daftar' => $this->faker->date(),
            'poli_id' => $this->faker->randomElement($idPoli),
            'dokter_id' => $this->faker->randomElement($idDokter),
            'keluhan' => $this->faker->sentence(),
            'diagnosis' => $this->faker->sentence(),
            'tindakan' => $this->faker->sentence(),
            'jadwal_pertemuan' => $this->faker->date(),
        ];
    }
}
