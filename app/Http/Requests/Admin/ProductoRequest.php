<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'categoria_id' => ['required', 'exists:categorias,id'],
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'precio' => ['required', 'numeric', 'min:0'],
            'descuento' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'costo_envio' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'imagen' => ['nullable', 'image', 'max:4096'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'precio' => $this->normalizeCopPrice($this->input('precio')),
            'costo_envio' => $this->normalizeCopPrice($this->input('costo_envio')),
            'descuento' => (float) ($this->descuento ?? 0),
        ]);
    }

    private function normalizeCopPrice(mixed $value): int
    {
        $digits = preg_replace('/\D+/', '', (string) $value);

        return (int) ($digits ?: 0);
    }
}
