<?php

namespace App\Repository\Vendedor;

use App\Models\Vendedor;
use App\Repository\Interfaces\Vendedor\VendedorRepositoryInterface;

class VendedorRepository implements VendedorRepositoryInterface
{
    public function getVendedor()
    {
        return Vendedor::all();
    }

    public function storeVendedor(array $data)
    {
        return Vendedor::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
        ]);
    }

    public function updateVendedor(array $data, int $id)
    {
        Vendedor::where('id', $id)
            ->update($data);
    }

    public function deleteVendedor(int $id)
    {
        return Vendedor::forceDestroy($id);
    }

    public function showVendedor(int $id)
    {
        return Vendedor::find($id);
    }
}
