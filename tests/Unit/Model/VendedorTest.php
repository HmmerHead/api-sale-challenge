<?php

namespace Tests\Unit\Model;

use App\Models\Vendedor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VendedorTest extends TestCase
{
    use RefreshDatabase;

    public function test_CreateVendedor()
    {
        Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com'
        ]);

        $this->assertDatabaseHas('vendedor', [
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com'
        ]);
    }

    public function test_ShouldHaveUniqueEmail()
    {
        Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com'
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        Vendedor::create([
            'nome' => 'Maria Oliveira',
            'email' => 'joao.silva@example.com'
        ]);
    }

    public function test_UpdateVendedor()
    {
        $vendedor = Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com'
        ]);

        $vendedor->update([
            'nome' => 'João Souza',
            'email' => 'joao.souza@example.com'
        ]);

        $this->assertDatabaseHas('vendedor', [
            'nome' => 'João Souza',
            'email' => 'joao.souza@example.com'
        ]);
    }

    public function test_DeleteVendedor()
    {
        $vendedor = Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com'
        ]);

        $vendedor->delete();

        $this->assertDatabaseMissing('vendedor', [
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com'
        ]);
    }
}
