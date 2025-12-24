<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // Agregar evento a favoritos
    public function addFavorite($id)
    {
        $user = Auth::user();
        $evento = Evento::find($id);

        if (!$evento) {
            return response()->json(['mensaje' => 'Evento no encontrado'], 404);
        }

        if ($user->eventosFavoritos()->where('evento_id', $id)->exists()) {
            return response()->json(['mensaje' => 'El evento ya está en favoritos'], 400);
        }

        $user->eventosFavoritos()->attach($id);

        return response()->json(['mensaje' => 'Evento agregado a favoritos']);
    }

    // Quitar evento de favoritos
    public function removeFavorite($id)
    {
        $user = Auth::user();
        $evento = Evento::find($id);

        if (!$evento) {
            return response()->json(['mensaje' => 'Evento no encontrado'], 404);
        }

        $user->eventosFavoritos()->detach($id);

        return response()->json(['mensaje' => 'Evento removido de favoritos']);
    }

    // Listar eventos favoritos del usuario
    public function getFavorites()
    {
        $user = Auth::user();
        $favoritos = $user->eventosFavoritos;

        return response()->json($favoritos);
    }
}