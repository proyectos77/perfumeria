<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // Todos los mensajes
        $mensajes = Contacto::latest()->get();

        // Conteos
        $total = Contacto::count();
        $delMes = Contacto::whereMonth('created_at', Carbon::now()->month)->count();
        $nuevos = Contacto::whereDate('created_at', Carbon::today())->count();

        return view('admin.contactos', compact('mensajes', 'total', 'delMes', 'nuevos'));
    }

    public function eliminar($id)
    {
        $contacto = \App\Models\Contacto::findOrFail($id);
        $contacto->delete();

        return redirect()->route('admin.contactos')->with('success', 'Mensaje eliminado correctamente.');
    }
}

