<?php

namespace Tests\Unit\Model;

use App\Models\Vendedor;
use App\Models\Venda;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VendaTest extends TestCase
{
    use RefreshDatabase;

    public function test_CreateVenda()
    {
        $vendedor = Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com'
        ]);

        Venda::create([
            'vendedor_id' => $vendedor->id,
            'valor' => 150.50,
            'valorComissao' => 15.5,
            'data_da_venda' => '2023-10-15'
        ]);

        $this->assertDatabaseHas('venda', [
            'vendedor_id' => $vendedor->id,
            'valor' => 150.50,
            'valorComissao' => 15.5,
            'data_da_venda' => '2023-10-15',
        ]);
    }

    public function test_ShouldHaveValidVendedorId()
    {
        $vendedor = Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com'
        ]);

        $venda = Venda::create([
            'vendedor_id' => $vendedor->id,
            'valor' => 150.50,
            'valorComissao' => 15.5,
            'data_da_venda' => '2023-10-15'
        ]);

        $this->assertEquals($venda->vendedor->nome, 'João Silva');
    }

    public function test_ShouldHaveValidVendedor()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Venda::create([
            'vendedor_id' => 999,
            'valor' => 150.50,
            'valorComissao' => 15.5,
            'data_da_venda' => '2023-10-15'
        ]);
    }

    public function test_UpdateVenda()
    {
        $vendedor = Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com'
        ]);

        $venda = Venda::create([
            'vendedor_id' => $vendedor->id,
            'valor' => 150.50,
            'valorComissao' => 15.5,
            'data_da_venda' => '2023-10-15'
        ]);

        $venda->update([
            'valor' => 200.00,
        ]);

        $this->assertDatabaseHas('venda', [
            'valor' => 200.00,
        ]);
    }

    public function test_DeleteVenda()
    {
        $vendedor = Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com'
        ]);

        $venda = Venda::create([
            'vendedor_id' => $vendedor->id,
            'valor' => 150.50,
            'data_da_venda' => '2023-10-15'
        ]);

        $venda->delete();

        $this->assertDatabaseMissing('venda', [
            'vendedor_id' => $vendedor->id,
            'valor' => 150.50,
            'data_da_venda' => '2023-10-15',
        ]);
    }
}
