<?php

namespace App\Repository\Vendedor;

use App\Dto\VendedorDTO;
use App\Models\Vendedor;
use App\Repository\Interfaces\Vendedor\VendedorRepositoryInterface;

class VendedorRepository implements VendedorRepositoryInterface
{
    public function getVendedor()
    {
        $registros = Vendedor::all()->toArray();
        return VendedorDTO::fromArray($registros);
    }

    public function storeVendedor(array $data)
    {
        return Vendedor::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'user_id' => $data['user_id'],
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
        $registros =  Vendedor::find($id)->toArray();

        return new VendedorDTO($registros)->toArray();
    }
}
