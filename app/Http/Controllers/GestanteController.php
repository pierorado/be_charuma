<?php

namespace App\Http\Controllers;
use App\Models\Gestante;
use App\Models\Animal;
use App\Http\Requests\Gestante\GStoreDelRequest;
use App\Http\Requests\Gestante\GUpdateDelRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GestanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gestantes = Gestante::with('animal')->paginate(10);
        return Inertia::render('Gestantes/Index',[
            'gestantes' => $gestantes
        ]);
    }

      /**
     * Show the form for creatin a new resource
     */
    public function create()
    {
        $animales = Animal::where('sexo', 'Hembra')->get();
        return Inertia::render('Gestantes/Create', [
            'animales' => $animales,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(GStoreDelRequest $request)
    {
        $data = $request->validated();
        Gestante::create($data)->all();
        return to_route('gestantes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gestante $gestante)
    {
        $gestante->load('animal'); // Carga la relación raza
        $prenezFecha = \Carbon\Carbon::parse($gestante->Fecha_prenez)->format('d-m-Y');
        $estimadaFecha = \Carbon\Carbon::parse($gestante->Fecha_estimada)->format('d-m-Y');
        $partoFecha = \Carbon\Carbon::parse($gestante->Fecha_parto)->format('d-m-Y');

        return Inertia::render('Gestantes/Show', [
        'gestante' => $gestante,
        'animales' => $gestante->animales,
        'prenez_fecha' => $prenezFecha,
        'estimada_fecha' => $estimadaFecha,
        'parto_fecha' => $partoFecha,
    ]);
    }

    /**
     * Show the form for editing the specifield resource
     */
    public function edit($id_gestacion)
    {
        $gestante = Gestante::findOrFail($id_gestacion);
        $animales = Animal::where('sexo', 'Hembra')->get();
        return Inertia::render('Gestantes/Edit', [
            'gestante' => $gestante,
            'animales' => $animales,
        ]);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(GUpdateDelRequest $request, Gestante $id_gestacion)
    {
        $data = $request->validated();
        $id_gestacion->update($data);

        return to_route('gestantes.edit', $id_gestacion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gestante $id_gestacion)
    {
        $id_gestacion->delete();
        return to_route('gestantes.index', $id_gestacion);
    }
}
