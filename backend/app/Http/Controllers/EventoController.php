<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    // Listar eventos
    public function index()
    {
        return response()->json(Evento::all());
    }

    // Crear evento (ESCRITURA)
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $evento = Evento::create($validated);

        return response()->json([
            'mensaje' => 'Evento creado correctamente',
            'evento' => $evento
        ], 201);
    }

    // Actualizar evento existente
    public function update(Request $request, $id)
    {
        $evento = Evento::find($id);

        if (!$evento) {
            return response()->json(['mensaje' => 'Evento no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'fecha' => 'sometimes|required|date',
            'lugar' => 'sometimes|required|string|max:255',
            'categoria' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
        ]);

        $evento->update($validated);

        return response()->json([
            'mensaje' => 'Evento actualizado correctamente',
            'evento' => $evento
        ]);
    }

    // Buscar / filtrar eventos por fecha o categoría
    public function search(Request $request)
    {
        $query = Evento::query();

        if ($request->filled('categoria')) {
            $query->where('categoria', $request->input('categoria'));
        }

        if ($request->filled('fecha')) {
            $query->whereDate('fecha', $request->input('fecha'));
        }

        if ($request->filled('fecha_from')) {
            $query->whereDate('fecha', '>=', $request->input('fecha_from'));
        }

        if ($request->filled('fecha_to')) {
            $query->whereDate('fecha', '<=', $request->input('fecha_to'));
        }

        $eventos = $query->get();

        return response()->json($eventos);
    }
}