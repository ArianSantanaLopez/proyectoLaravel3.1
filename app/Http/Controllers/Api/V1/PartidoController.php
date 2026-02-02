<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Partido;
use App\Http\Resources\PartidoResource;
use App\Http\Requests\Api\V1\StorePartidoRequest;
use App\Http\Requests\Api\V1\UpdatePartidoRequest;

class PartidoController extends Controller
{
    // LISTAR TODOS
    public function index()
    {
        return PartidoResource::collection(Partido::paginate(10));
    }

    // MOSTRAR UNO
    public function show(Partido $partido)
    {
        return new PartidoResource($partido);
    }

    // CREAR
    public function store(StorePartidoRequest $request)
    {
        $partido = Partido::create($request->validated());

        return new PartidoResource($partido);
    }

    // ACTUALIZAR
    public function update(UpdatePartidoRequest $request, Partido $partido)
    {
        $partido->update($request->validated());

        return new PartidoResource($partido);
    }

    // ELIMINAR
    public function destroy(Partido $partido)
    {
        $partido->delete();

        return response()->noContent(); // 204 correcto
    }
}