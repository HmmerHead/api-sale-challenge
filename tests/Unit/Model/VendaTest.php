<?php

namespace Tests\Unit\Model;

use App\Models\User;
use App\Models\UserType;
use App\Models\Vendedor;
use App\Models\Venda;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class VendaTest extends TestCase
{
    use RefreshDatabase;

    public function test_CreateVenda()
    {
        $userType = UserType::create([
            'tipo' => 'vendedor',
        ]);

        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@empresa.com',
            'password' => Hash::make('senha123'),
            'user_type_id' => $userType->id,
        ]);

        $vendedor = Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com',
            'user_id' => $user->id
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
        $userType = UserType::create([
            'tipo' => 'vendedor',
        ]);

        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@empresa.com',
            'password' => Hash::make('senha123'),
            'user_type_id' => $userType->id,
        ]);

        $vendedor = Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com',
            'user_id' => $user->id
        ]);

        $venda = Venda::create([
            'vendedor_id' => $vendedor->id,
            'valor' => 150.50,
            'valorComissao' => 15.5,
            'data_da_venda' => '2023-10-15',
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
        $userType = UserType::create([
            'tipo' => 'vendedor',
        ]);

        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@empresa.com',
            'password' => Hash::make('senha123'),
            'user_type_id' => $userType->id,
        ]);
        
        $vendedor = Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com',
            'user_id' => $user->id
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
        $userType = UserType::create([
            'tipo' => 'vendedor',
        ]);

        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@empresa.com',
            'password' => Hash::make('senha123'),
            'user_type_id' => $userType->id,
        ]);
        
        $vendedor = Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com',
            'user_id' => $user->id
        ]);

        $venda = Venda::create([
            'vendedor_id' => $vendedor->id,
            'valorComissao' => 15.5,
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

    public function test_CalculoComissao()
    {
        $venda = new venda();
        $venda->valor = 10;
        $this->assertEquals($expected = 0.85, $venda->valorDaComissao());
    }

    public function test_fillable()
    {
        $pedido = new Venda();

        $expected = [
            'vendedor_id',
            'valor',
            'valorComissao',
            'data_da_venda',
        ];

        $this->assertEqualsCanonicalizing($expected, $pedido->getFillable());
    }

    public function test_venda_relationship()
    {
        $venda = new Venda();

        $relation = $venda->vendedor();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals(Vendedor::class, $relation->getRelated()::class);
    }
}
