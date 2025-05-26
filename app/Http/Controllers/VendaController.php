<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendaRequest;
use App\Http\Requests\UpdateVendaRequest;
use App\Models\Venda;
use App\Services\Interfaces\Financeiro\FinanceiroInterface;
use App\Services\Interfaces\Vendas\VendasServiceInterface as VendasService;

class VendaController extends Controller
{
    public function __construct(
        public readonly VendasService $vendas,
        public readonly FinanceiroInterface $financeiro
    ) {

    }

    public function index()
    {
        return $this->vendas->getVendas();
    }

    public function store(StoreVendaRequest $request)
    {
        return $this->vendas->storeVendas($request->all());
    }

    public function show(Venda $venda)
    {
        return $this->vendas->showVendas($venda->id);
    }

    public function update(UpdateVendaRequest $request, Venda $venda)
    {
        return $this->vendas->updateVendas($request->all(), $venda->id);
    }

    public function destroy(Venda $venda)
    {
        return $this->vendas->deleteVendas($venda->id);
    }
}
