<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendedor extends Model
{
    /** @use HasFactory<\Database\Factories\VendedorFactory> */
    use HasFactory;

    protected $table = 'vendedor';

    /**
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function vendas(): HasMany
    {
        return $this->hasMany(Venda::class, 'vendedor_id', 'id');
    }
}
