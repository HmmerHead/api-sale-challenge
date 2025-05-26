<?php

namespace Tests\Unit\Services;

use App\Repository\Interfaces\Vendas\VendasRepositoryInterface;
use App\Services\Vendas\VendasService;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class VendasServiceTest extends TestCase
{
    private VendasRepositoryInterface&MockObject $vendedorService;

    private $service;

    protected function setUp(): void
    {
        $this->vendedorService = $this->createMock(VendasRepositoryInterface::class);

        $this->service = new VendasService(
            $this->vendedorService
        );
    }

    public function test_CreateVendaService()
    {
        $venda = ['id' => 1, 'nome' => 'João', 'email' => 'email'];

        $this->vendedorService->expects($this->once())
            ->method('getVendas')
            ->willReturn($venda);
        
        $result = $this->service->getVendas();

        $this->assertEquals($venda, $result);
    }
}
