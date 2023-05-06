<?php

namespace Database\Factories;

use App\Models\Surat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat_masuk>
 */
class Surat_masukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'surat_id' => Surat::all()->random()->id,
            'asal_surat' => $this->faker->sentence(),
            'tgl_masuk' => $this->faker->date(),
        ];
    }
}
