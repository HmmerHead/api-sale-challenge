<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venda extends Model
{
    /** @use HasFactory<\Database\Factories\VendaFactory> */
    use HasFactory;

    public const COMISSAO = 8.5;

    protected $table = 'venda';

    protected $fillable = [
        'vendedor_id',
        'valor',
        'valorComissao',
        'data_da_venda',
    ];

    public function valorDaComissao()
    {
        return ($this->valor * Venda::COMISSAO) / 100;
    }

    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(Vendedor::class, 'vendedor_id', 'id');
    }
}
