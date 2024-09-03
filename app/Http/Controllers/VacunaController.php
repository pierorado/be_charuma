<?php

namespace App\Http\Controllers;
use App\Models\Vacuna;
use App\Models\Animal;
use App\Http\Requests\Vacuna\VStoreRequest;
use App\Http\Requests\Vacuna\VUpdateRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VacunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacunas = Vacuna::with('animal')->paginate(10);
        return Inertia::render('Vacunas/Index',[
            'vacunas' => $vacunas
        ]);
    }

      /**
     * Show the form for creatin a new resource
     */
    public function create()
    {
        $animales = Animal::all();
        return Inertia::render('Vacunas/Create', [
            'animales' => $animales,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(VStoreRequest $request)
    {
        $data = $request->validated();
        Vacuna::create($data)->all();
        return to_route('vacunas.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacuna $vacuna)
    {
        $vacuna->load('animal'); // Carga la relación raza
        $adminfecha = \Carbon\Carbon::parse($vacuna->Fecha_administrada)->format('d-m-Y');
        $prografecha= \Carbon\Carbon::parse($vacuna->Fecha_programada)->format('d-m-Y');

        return Inertia::render('Vacunas/Show', [
        'vacuna' => $vacuna,
        'animales' => $vacuna->animales,
        'admin_fecha' => $adminfecha,
        'progra_fecha' => $prografecha,
    ]);
    }

    /**
     * Show the form for editing the specifield resource
     */
    public function edit($id_vacuna)
    {
        $vacuna = Vacuna::findOrFail($id_vacuna);
        $animales = Animal::create($data)->all();
        return Inertia::render('Vacunas/Edit', [
            'vacuna' => $vacuna,
            'animales' => $animales,
        ]);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(VUpdateRequest $request, Vacuna $id_vacuna)
    {
        $data = $request->validated();
        $id_vacuna->update($data);

        return to_route('vacunas.edit', $id_vacuna);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacuna $id_vacuna)
    {
        $id_vacuna->delete();
        return to_route('vacunas.index', $id_vacuna);
    }
}
