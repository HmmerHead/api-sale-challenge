<?php

namespace App\Services\Vendas;

use App\Repository\Interfaces\Vendas\VendasRepositoryInterface;
use App\Services\Interfaces\Vendas\VendasServiceInterface;

class VendasService implements VendasServiceInterface
{
    public function __construct(public readonly VendasRepositoryInterface $vendas)
    {

    }

    public function getVendas()
    {
        return $this->vendas->getVendas();
    }

    public function storeVendas(array $data)
    {
        return $this->vendas->storeVendas($data);
    }

    public function updateVendas(array $data, int $id)
    {
        return $this->vendas->updateVendas($data, $id);
    }

    public function deleteVendas(int $id)
    {
        return $this->vendas->deleteVendas($id);
    }

    public function showVendas(int $id)
    {
        return $this->vendas->showVendas($id);
    }
}
