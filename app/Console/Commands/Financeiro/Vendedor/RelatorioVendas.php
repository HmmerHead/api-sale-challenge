<?php

namespace App\Console\Commands\Financeiro\Vendedor;

use App\Jobs\Financeiro\Vendedores;
use App\Services\Interfaces\Financeiro\FinanceiroInterface;
use App\Services\Interfaces\Vendedor\VendedorServiceInterface;
use Illuminate\Console\Command;

class RelatorioVendas extends Command
{
    public function __construct(
        public readonly FinanceiroInterface $financeiroVendas,
        public readonly VendedorServiceInterface $vendedor
    ) {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:relatorio-vendas-totais';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'envio dos relatórios - Total Comissão';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Vendedores::dispatch($this->financeiroVendas, $this->vendedor);
    }
}
