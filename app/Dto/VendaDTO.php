<?php

namespace App\Dto;

class VendaDTO
{
    public int $id;
    public float $valor;
    public float $valorComissao;
    public string $dataDaVenda;
    public VendedorDTO $vendedor;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->valor = (float) $data['valor'];
        $this->valorComissao = (float) $data['valorComissao'];
        $this->dataDaVenda = $data['data_da_venda'];
        $this->vendedor = new VendedorDTO($data['vendedor']);
    }

    public static function fromArray(array $vendas): array
    {
        return array_map(fn($venda) => new self($venda), $vendas);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'valor' => $this->valor,
            'valorComissao' => $this->valorComissao,
            'data_da_venda' => $this->dataDaVenda,
            'vendedor' => $this->vendedor->toArray(),
        ];
    }
}
