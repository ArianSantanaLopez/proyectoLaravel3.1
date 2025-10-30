<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartidoController extends Controller
{
    protected $csvFile = 'partidos.csv';

    // Muestra lista de partidos
    public function index()
    {
        $path = storage_path('app/' . $this->csvFile);
        $partidos = [];

        if (file_exists($path)) {
            if (($handle = fopen($path, 'r')) !== false) {
                $headers = fgetcsv($handle);
                while (($row = fgetcsv($handle)) !== false) {
                    $partidos[] = array_combine($headers, $row);
                }
                fclose($handle);
            }
        }

        return view('partidos.index', compact('partidos'));
    }

    // Muestra el formulario
    public function create()
    {
        return view('partidos.create');
    }

    // Procesa el formulario y guarda los datos
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

        // Guardar en CSV
        $file = storage_path('app/' . $this->csvFile);
        $nuevo = !file_exists($file);

        $handle = fopen($file, 'a');
        if ($nuevo) {
            fputcsv($handle, ['fecha', 'hora', 'local', 'visitante', 'ubicacion', 'notas']);
        }

        fputcsv($handle, [
            $validated['fecha'],
            $validated['hora'],
            $validated['local'],
            $validated['visitante'],
            $validated['ubicacion'] ?? '',
            $validated['notas'] ?? '',
        ]);
        fclose($handle);

        return redirect()->route('partidos.index')->with('success', 'Partido registrado correctamente');
    }
}
