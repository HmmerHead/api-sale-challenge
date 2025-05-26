<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    /** @use HasFactory<\Database\Factories\UserTypeFactory> */
    use HasFactory;

    public const TIPO_ADMIN = 'admin';
    public const TIPO_VENDEDOR = 'vendedor';

    protected $table = 'user_type';
    protected $fillable = ['tipo'];
}
