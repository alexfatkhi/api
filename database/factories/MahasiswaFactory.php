<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Progdi;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'progdi_id' => Progdi::inRandomOrder()->first()->id,
            'nim'       => '2024' . $this->faker->unique()->numerify('###'),
            'nama'      => $this->faker->name,
            'alamat'    => $this->faker->address,
            'umur'      => $this->faker->numberBetween(18, 25),
        ];
    }
}
