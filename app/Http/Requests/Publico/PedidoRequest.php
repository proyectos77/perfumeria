<?php

namespace App\Http\Requests\Publico;

use App\Models\Pedido;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'producto_id' => ['required', 'exists:productos,id'],
            'cantidad' => ['required', 'integer', 'min:1'],
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:30'],
            'correo' => ['required', 'email', 'max:255'],
            'tipo_entrega' => ['required', Rule::in([Pedido::ENTREGA_RECOGER_TIENDA, Pedido::ENTREGA_ENVIO])],
            'direccion' => ['required_if:tipo_entrega,' . Pedido::ENTREGA_ENVIO, 'nullable', 'string', 'max:255'],
        ];
    }
}
