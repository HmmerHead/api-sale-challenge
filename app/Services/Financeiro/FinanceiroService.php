<?php

namespace App\Services\Financeiro;

use App\Repository\Interfaces\Financeiro\FinanceiroRepositoryInterface;
use App\Services\Interfaces\Financeiro\FinanceiroInterface;

class FinanceiroService implements FinanceiroInterface
{
    public function __construct(public readonly FinanceiroRepositoryInterface $financeiro)
    {

    }

    public function getVendasPorVendedor(int $vendedorId)
    {
        return $this->financeiro->getVendasPorVendedor($vendedorId);
    }

    public function getTotalVendas()
    {
        return $this->financeiro->getTotalVendas();
    }

    public function getTotalComissao(int $vendedorId)
    {
        return $this->financeiro->getTotalComissao($vendedorId);
    }

}