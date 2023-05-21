<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\KategoriModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KategoriModel>
 */
class KategoriModelFactory extends Factory
{
    protected $model = KategoriModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word()
        ];
    }
}
