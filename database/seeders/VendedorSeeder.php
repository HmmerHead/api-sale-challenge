<?php

namespace Database\Seeders;

use App\Models\Venda;
use App\Models\Vendedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendedor::factory()
            ->count(5)
            ->create()
            ->each(function ($vendedor) {
                Venda::factory()
                    ->count(rand(3, 7))
                    ->create([
                        'vendedor_id' => $vendedor->id,
                    ]);
            });
    }
}
