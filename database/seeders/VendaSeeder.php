<?php

namespace Database\Seeders;

use App\Models\Venda;
use Illuminate\Database\Seeder;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venda::create([
            'vendedor_id' => 1,
            'valor' => 150.50,
            'valorComissao' => 15.5,
            'data_da_venda' => '2023-10-15'
        ]);
    }
}
