<?php

namespace App\Repository\Vendas;

use App\Dto\VendaDTO;
use App\Models\Venda;
use App\Repository\Interfaces\Vendas\VendasRepositoryInterface;

class VendasRepository implements VendasRepositoryInterface
{
    public function getVendas()
    {
        $registros = Venda::with('vendedor')->get()->toArray();
        return VendaDTO::fromArray($registros);
    }

    public function storeVendas(array $data)
    {
        return Venda::create([
            'vendedor_id' => $data['vendedor_id'],
            'valor' => $data['valor'],
            'valorComissao' => (new Venda())->valorDaComissao(),
            'data_da_venda' => $data['data_da_venda']
        ]);
    }

    public function updateVendas(array $data, int $id)
    {
        Venda::where('id', $id)
            ->update([
                'vendedor_id' => $data['vendedor_id'],
                'valor' => $data['valor'],
                'valorComissao' => (new Venda())->valorDaComissao(),
                'data_da_venda' => $data['data_da_venda']
            ]);
    }

    public function deleteVendas(int $id)
    {
        return Venda::forceDestroy($id);
    }

    public function showVendas(int $id)
    {
        $registros = Venda::with('vendedor')->find($id)->toArray();

        return new VendaDTO($registros)->toArray();
    }
}
