<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calificacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'nombre',
        'correo',
        'calificacion',
        'comentario',
        'aprobado',
        'ip',
    ];

    protected $casts = [
        'calificacion' => 'integer',
        'aprobado' => 'boolean',
    ];

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }
}
