<?php

namespace App\Repository\Interfaces\Financeiro;

interface FinanceiroRepositoryInterface
{
    public function getVendasPorVendedor(int $vendedorId);
    public function getTotalComissao();
}
