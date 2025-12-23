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
}