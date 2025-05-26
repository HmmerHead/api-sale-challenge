<?php

namespace Database\Factories;

use App\Models\Vendedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venda>
 */
class VendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vendedor_id' => Vendedor::factory(),
            'valor' => $this->faker->randomFloat(2, 50, 2000),
            'valorComissao' => $this->faker->randomFloat(2, 5, 200),
            'data_da_venda' => $this->faker->date(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
