<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    // Muestra lista de partidos desde la BD
    public function index()
    {
        $partidos = Partido::all();
        return view('partidos.index', compact('partidos'));
    }

    // Muestra el formulario
    public function create()
    {
        return view('partidos.create');
    }

    // Procesa el formulario y guarda en BD
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            'local' => 'required|string|max:100',
            'visitante' => 'required|string|max:100|different:local',
            'ubicacion' => 'nullable|string|max:255',
            'notas' => 'nullable|string|max:500',
        ]);

        // Guardar en base de datos
        Partido::create($validated);

        return redirect()->route('partidos.index')
            ->with('success', 'Partido registrado correctamente');
    }
}