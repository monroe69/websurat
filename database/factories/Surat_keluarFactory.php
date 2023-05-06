<?php

namespace Database\Factories;

use App\Models\Surat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat_keluar>
 */
class Surat_keluarFactory extends Factory
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
            'tujuan_surat' => $this->faker->sentence(),
            'tgl_keluar' => $this->faker->date(),
        ];
    }
}
