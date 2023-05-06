<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class SuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_surat' => $this->faker->randomNumber(5, true),
            'tgl_surat' => $this->faker->date(),
            'perihal' => $this->faker->sentence(),
            'file_surat' => $this->faker->imageUrl(),
        ];
    }
}
