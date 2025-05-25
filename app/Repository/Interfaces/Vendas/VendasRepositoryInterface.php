<?php

namespace App\Repository\Interfaces\Vendas;

interface VendasRepositoryInterface
{
    public function getVendas();
    public function storeVendas(array $data);
    public function updateVendas(array $data, int $id);
    public function deleteVendas(int $id);
    public function showVendas(int $id);
}
