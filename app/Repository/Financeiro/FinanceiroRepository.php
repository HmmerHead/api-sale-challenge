<?php

namespace App\Repository\Financeiro;

use App\Repository\Interfaces\Financeiro\FinanceiroRepositoryInterface;
use Illuminate\Support\Facades\DB;

class FinanceiroRepository implements FinanceiroRepositoryInterface
{
    /**
     * vendedor ao final de cada dia com a quantidade de vendas
     * realizadas no dia, o valor total delas e o valor total das comissão
     *
     * @return void
     */
    public function getVendasPorVendedor(int $vendedorId)
    {
        return DB::table('venda')
            ->join('vendedor', 'venda.vendedor_id', '=', 'vendedor.id')
            ->select(
                DB::raw('IFNULL(SUM(venda.valor), 0) as total'),
                DB::raw('IFNULL(SUM(venda.valorComissao), 0) as total_comissao'),
                DB::raw('count(venda.id) as qnt')
            )
            ->where('venda.vendedor_id', '=', $vendedorId)
            ->get()
            ->toArray();
    }

    /**
     * administrador reenvie o e-mail de comissão a um determinado vendedor
     *
     * @return void
     */
    public function getTotalComissao()
    {
        return DB::table('venda')
            ->join('vendedor', 'venda.vendedor_id', '=', 'vendedor.id')
            ->select(
                DB::raw('SUM(venda.valorComissao) as total'),
            )
            ->get()
            ->toArray();
    }
}
