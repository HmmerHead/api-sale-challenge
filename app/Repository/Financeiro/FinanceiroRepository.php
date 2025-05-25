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
            ->join('users', 'users.id', '=', 'vendedor.user_id')
            ->join('user_type', 'users.user_type_id', '=', 'user_type.id')
            ->select(
                DB::raw('SUM(venda.valor) as total'),
                DB::raw('SUM(venda.valorComissao) as total_comissao'),
                DB::raw('count(venda.id) as qnt')
            )
            ->where('venda.vendedor_id', '=', $vendedorId)
            ->get();
    }

    /**
     * administrador do sistema contendo todas a soma de todas as vendas efetuadas no dia;
     *
     * @return void
     */
    public function getTotalVendas()
    {
        return DB::table('venda')
            ->join('vendedor', 'venda.vendedor_id', '=', 'vendedor.id')
            ->select(
                DB::raw('SUM(venda.valor) as total'),
            )
            ->get();
    }

    /**
     * administrador reenvie o e-mail de comissão a um determinado vendedor
     *
     * @return void
     */
    public function getTotalComissao(int $vendedorId)
    {
        return DB::table('venda')
            ->join('vendedor', 'venda.vendedor_id', '=', 'vendedor.id')
            ->select(
                DB::raw('SUM(venda.valorComissao) as total'),
            )
            ->where('venda.vendedor_id', '=', $vendedorId)
            ->get();
    }
}
