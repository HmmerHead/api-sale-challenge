<?php

namespace Tests\Unit\Model;

use App\Models\User;
use App\Models\UserType;
use App\Models\Venda;
use App\Models\Vendedor;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class VendedorTest extends TestCase
{
    use RefreshDatabase;

    public function test_CreateVendedor()
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

        Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com',
            'user_id' => $user->id
        ]);

        $this->assertDatabaseHas('vendedor', [
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com'
        ]);
    }

    public function test_ShouldHaveUniqueEmail()
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

        Vendedor::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com',
            'user_id' => $user->id
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        Vendedor::create([
            'nome' => 'Maria Oliveira',
            'email' => 'joao.silva@example.com'
        ]);
    }

    public function test_UpdateVendedor()
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

        $vendedor->delete();

        $this->assertDatabaseMissing('vendedor', [
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com'
        ]);
    }

    public function test_fillable()
    {
        $pedido = new Vendedor();

        $expected = [
            'nome',
            'email',
            'user_id',
        ];

        $this->assertEqualsCanonicalizing($expected, $pedido->getFillable());
    }

    public function test_vendedor_relationship()
    {
        $vendedor = new Vendedor();

        $relation = $vendedor->vendas();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals(Venda::class, $relation->getRelated()::class);
    }
}
