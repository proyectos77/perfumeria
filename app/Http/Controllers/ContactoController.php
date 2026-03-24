<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use App\Models\Contacto;
use Illuminate\Support\Facades\Log;
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

        Contacto::create($request->only([
            'nombre',
            'correo',
            'mensaje',
        ]));

        try {
            Mail::to($request->correo)->send(
                new ContactoRecibido($request->nombre, $request->mensaje)
            );

            Mail::to(config('mail.admin_address'))->send(
                new NuevoContacto($request->nombre, $request->correo, $request->mensaje)
            );
        } catch (Throwable $exception) {
            Log::warning('No fue posible enviar los correos del formulario de contacto.', [
                'correo' => $request->correo,
                'error' => $exception->getMessage(),
            ]);
        }

        return redirect()->route('contacto')
            ->with('success', 'Recibimos tu mensaje correctamente. Nuestro equipo te respondera muy pronto.');
    }
}
