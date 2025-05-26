<?php

namespace App\Jobs\Financeiro;

use App\Mail\Financeiro\Vendedor\VendasPorVendedor;
use App\Services\Interfaces\Financeiro\FinanceiroInterface;
use App\Services\Interfaces\Vendedor\VendedorServiceInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class Vendedores implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public readonly FinanceiroInterface $financeiroVendas,
        public readonly VendedorServiceInterface $vendedor
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        /**
         * Criar uma consulta especifica para buscar de x em x vendedores
         */
        $vendedores = $this->vendedor->getVendedor();

        foreach ($vendedores as $vendedor) {
            $vendedores = $this->financeiroVendas->getVendasPorVendedor($vendedor->id);
            Mail::to($vendedor->email)->send(new VendasPorVendedor());
        }
    }
}
