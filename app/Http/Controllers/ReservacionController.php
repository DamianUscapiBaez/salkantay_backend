<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Reservacion::with(['cliente', 'tour'])
            ->paginate(5);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cantidadPersonas' => 'required|integer',
            'precioTotal' => 'required|numeric',
            'id_cliente' => 'required|exists:clientes,id',
            'id_tour' => 'required|exists:tours,id',
        ]);

        $reservacion = Reservacion::create($request->all());

        return response()->json($reservacion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservacion = Reservacion::find($id);

        if (!$reservacion) {
            return response()->json(['message' => 'Reservación no encontrada'], 404);
        }

        return response()->json($reservacion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reservacion = Reservacion::find($id);

        if (!$reservacion) {
            return response()->json(['message' => 'Reservación no encontrada'], 404);
        }

        $request->validate([
            'cantidadPersonas' => 'sometimes|required|integer',
            'precioTotal' => 'sometimes|required|numeric',
            'id_cliente' => 'sometimes|required|exists:clientes,id',
            'id_tour' => 'sometimes|required|exists:tours,id',
        ]);

        $reservacion->update($request->all());

        return response()->json($reservacion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $reservacion = Reservacion::find($id);

        if (!$reservacion) {
            return response()->json(['message' => 'Reservación no encontrada'], 404);
        }

        $reservacion->delete();

        return response()->json(['message' => 'Reservación eliminada']);
    }
}
