<?php

namespace App\Services\Interfaces\Vendedor;

interface VendedorServiceInterface
{
    public function getVendedor();
    public function storeVendedor(array $data);
    public function updateVendedor(array $data, int $id);
    public function deleteVendedor(int $id);
    public function showVendedor(int $id);
}
