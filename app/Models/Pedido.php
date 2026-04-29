<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    use HasFactory;

    public const ESTADO_PENDIENTE = 'pendiente';
    public const ESTADO_CONFIRMADO = 'confirmado';
    public const ESTADO_CANCELADO = 'cancelado';

    protected $fillable = [
        'total',
        'estado',
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    public function detalles(): HasMany
    {
        return $this->hasMany(DetallePedido::class);
    }
}
