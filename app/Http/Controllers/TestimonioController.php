<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Testimonio;

class TestimonioController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'empresa' => 'required|string|max:100',
            'cargo' => 'required|string|max:100',
            'calificacion' => 'required|integer|between:1,5',
            'comentario' => 'required|string|min:10',
        ]);

        Testimonio::create($validated);

        return redirect()->route('servicios')->with('success', '¡Gracias por tu Comentario!');
    }

    public function home()
    {
        $testimoniosDestacados = Testimonio::latest()->take(4)->get();
        $testimoniosRestantes = Testimonio::latest()->skip(8)->paginate(8); // para modal
        $featuredProjects = Project::query()
            ->published()
            ->featured()
            ->ordered()
            ->take(8)
            ->get();

        return view('home', compact('testimoniosDestacados', 'testimoniosRestantes', 'featuredProjects'));
    }

}
