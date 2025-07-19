<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        // 1. Obtener los mensajes con paginación
        $mensajes = Contacto::paginate(10);
        
        // 2. Definir las variables de conteo
        $total = Contacto::count();
        $delMes = Contacto::whereMonth('created_at', Carbon::now()->month)->count();
        $nuevos = Contacto::whereDate('created_at', Carbon::today())->count();
        
        // 3. Devolver la vista y pasar TODAS las variables
        return view('admin.contactos', compact('mensajes', 'total', 'delMes', 'nuevos'));
    }

    public function eliminar($id)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();

        return redirect()->route('admin.contactos')->with('success', 'Mensaje eliminado correctamente.');
    }
}