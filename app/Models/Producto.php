<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'categoria_id',
        'nombre',
        'descripcion',
        'precio',
        'descuento',
        'costo_envio',
        'stock',
        'imagen',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'descuento' => 'decimal:2',
        'costo_envio' => 'decimal:2',
        'stock' => 'integer',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(DetallePedido::class);
    }

    public function calificaciones(): HasMany
    {
        return $this->hasMany(Calificacion::class);
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }

    public function calificacionesAprobadas(): HasMany
    {
        return $this->hasMany(Calificacion::class)->where('aprobado', true);
    }

    public function comentariosAprobados(): HasMany
    {
        return $this->hasMany(Comentario::class)->where('aprobado', true);
    }

    public function getCalificacionPromedio(): float
    {
        $aprobadas = $this->calificacionesAprobadas()->avg('calificacion');
        return $aprobadas ?? 0;
    }

    public function getCalificacionTotal(): int
    {
        return $this->calificacionesAprobadas()->count();
    }

    public function imagenUrl(): string
    {
        if ($this->imagen) {
            if (Str::startsWith($this->imagen, ['images/', 'img/'])) {
                return asset($this->imagen);
            }

            return asset('storage/' . ltrim($this->imagen, '/'));
        }

        return asset('images/logo-pagina.png');
    }

    public function getPrecioConDescuento()
    {
        if ($this->descuento > 0) {
            return $this->precio - ($this->precio * ($this->descuento / 100));
        }
        return $this->precio;
    }

    public function getPrecioFormato(): string
    {
        return number_format($this->precio, 0, ',', '.') . ' COP';
    }

    public function getPrecioConDescuentoFormato(): string
    {
        $precio = $this->getPrecioConDescuento();
        return number_format($precio, 0, ',', '.') . ' COP';
    }

    public function getCostoEnvioFormato(): string
    {
        return number_format($this->costo_envio, 0, ',', '.') . ' COP';
    }
}
