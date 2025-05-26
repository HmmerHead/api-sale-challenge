<?php

namespace App\Dto;

class VendedorDTO
{
    public int $id;
    public string $nome;
    public string $email;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->nome = $data['nome'];
        $this->email = $data['email'];
    }

    public static function fromArray(array $users): array
    {
        return array_map(fn($user) => new self($user), $users);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email,
        ];
    }
}
