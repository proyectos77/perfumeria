<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PaginasController extends Controller
{
    public function quienesSomos(): View
    {
        return view('paginas.quienes-somos');
    }

    public function contacto(): View
    {
        return view('paginas.contacto');
    }

    public function terminos(): View
    {
        return view('paginas.terminos');
    }

    public function politicaPrivacidad(): View
    {
        return view('paginas.politica-privacidad');
    }
}
