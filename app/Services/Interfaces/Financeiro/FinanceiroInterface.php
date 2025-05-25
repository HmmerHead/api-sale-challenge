<?php

namespace App\Services\Interfaces\Financeiro;

interface FinanceiroInterface
{
    public function getVendasPorVendedor(int $vendedorId);
    public function getTotalVendas();
    public function getTotalComissao(int $vendedorId);
}
