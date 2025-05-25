<?php

namespace App\Services\Vendedores;

use App\Repository\Interfaces\Vendedor\VendedorRepositoryInterface;
use App\Services\Interfaces\Vendedor\VendedorServiceInterface;

class VendedoresService implements VendedorServiceInterface
{
    public function __construct(public readonly VendedorRepositoryInterface $vendas)
    {

    }

    public function getVendedor()
    {
        return $this->vendas->getVendedor();
    }

    public function storeVendedor(array $data)
    {
        return $this->vendas->storeVendedor($data);
    }

    public function updateVendedor(array $data, int $id)
    {
        return $this->vendas->updateVendedor($data, $id);
    }

    public function deleteVendedor(int $id)
    {
        return $this->vendas->deleteVendedor($id);
    }

    public function showVendedor(int $id)
    {
        return $this->vendas->showVendedor($id);
    }
}
