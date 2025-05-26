<?php

namespace App\Http\Controllers;

use App\Mail\Financeiro\Administrador\VendasDoDia;
use App\Services\Interfaces\Financeiro\FinanceiroInterface;
use App\Services\Interfaces\Vendedor\VendedorServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReenvioEmailComissao extends Controller
{
    public function __construct(
        public readonly VendedorServiceInterface $vendedor,
        public readonly FinanceiroInterface $financeiroVendas,
    ) {

    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $vendedor = $this->vendedor->showVendedor($request->get('id'));
        $vendasComissao = $this->financeiroVendas->getTotalComissao();

        Mail::to($vendedor['email'])->send(new VendasDoDia($vendasComissao));
    }
}
