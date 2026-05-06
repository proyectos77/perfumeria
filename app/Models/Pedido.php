<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    use HasFactory;

    public const ESTADO_COMPRADO = 'comprado';
    public const ESTADO_CONFIRMADO = 'confirmado';
    public const ESTADO_ENVIADO = 'enviado';
    public const ESTADO_ENTREGADO = 'entregado';
    public const ESTADO_CANCELADO = 'cancelado';
    public const ENTREGA_RECOGER_TIENDA = 'recoger_tienda';
    public const ENTREGA_ENVIO = 'envio';

    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'correo',
        'token_seguimiento',
        'tipo_entrega',
        'direccion',
        'subtotal',
        'costo_envio',
        'total',
        'estado',
        'medio_pago',
        'visto_admin_at',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'costo_envio' => 'decimal:2',
        'total' => 'decimal:2',
        'visto_admin_at' => 'datetime',
    ];

    public function detalles(): HasMany
    {
        return $this->hasMany(DetallePedido::class);
    }

    public function estados(): HasMany
    {
        return $this->hasMany(PedidoEstado::class);
    }

    public function nombreCompleto(): string
    {
        return trim($this->nombres . ' ' . $this->apellidos);
    }

    public function tipoEntregaLabel(): string
    {
        return $this->tipo_entrega === self::ENTREGA_ENVIO
            ? 'Envio a direccion'
            : 'Recoge en tienda';
    }

    public static function estadosFlujo(): array
    {
        return [
            self::ESTADO_COMPRADO => 'Pedido comprado',
            self::ESTADO_CONFIRMADO => 'Pedido confirmado',
            self::ESTADO_ENVIADO => 'Pedido enviado',
            self::ESTADO_ENTREGADO => 'Pedido entregado',
        ];
    }

    public static function estadosAdmin(): array
    {
        return self::estadosFlujo() + [
            self::ESTADO_CANCELADO => 'Pedido cancelado',
        ];
    }

    public function estadoLabel(): string
    {
        return self::estadosAdmin()[$this->estado] ?? ucfirst((string) $this->estado);
    }

    public function estadoColorClass(): string
    {
        return match ($this->estado) {
            self::ESTADO_COMPRADO => 'order-status--orange',
            self::ESTADO_CONFIRMADO => 'order-status--blue',
            self::ESTADO_ENVIADO => 'order-status--purple',
            self::ESTADO_ENTREGADO => 'order-status--green',
            self::ESTADO_CANCELADO => 'order-status--red',
            default => 'order-status--gray',
        };
    }

    public function registrarEstado(string $estado, ?string $descripcion = null): void
    {
        $this->estados()->create([
            'estado' => $estado,
            'descripcion' => $descripcion ?? (self::estadosAdmin()[$estado] ?? ucfirst($estado)),
        ]);
    }
}
