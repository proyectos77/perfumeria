<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use Illuminate\Support\Facades\Mail; 
use App\Mail\ContactoRecibido; 
use App\Mail\NuevoContacto;     


class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required|min:10',
            'acepta_terminos' => 'accepted',
        ]);

        // Guardar en la base de datos
        Contacto::create($request->all());

        // Enviar correo al visitante
        Mail::to($request->correo)->send(
            new ContactoRecibido($request->nombre, $request->mensaje)
        );

        // Enviar correo al admin (tú mismo)
        Mail::to("pjhovanysperezpolo@gmail.com")->send(
            new NuevoContacto($request->nombre, $request->correo, $request->mensaje)
        );

        return redirect()->route('contacto')
            ->with('success', 'Tu mensaje fue enviado y guardado correctamente.');
    }
}

