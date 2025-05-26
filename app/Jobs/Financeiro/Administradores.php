<?php

namespace App\Jobs\Financeiro;

use App\Mail\Financeiro\Administrador\VendasDoDia;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Services\Interfaces\Financeiro\FinanceiroInterface;
use App\Services\Interfaces\Vendedor\VendedorServiceInterface;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class Administradores implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

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
        $vendedores = $this->vendedor->getVendedor();
        foreach ($vendedores as $vendedor) {
            $vendedores = $this->financeiroVendas->getTotalComissao();
            Mail::to($vendedor->email)->send(new VendasDoDia([]));
        }
    }
}
